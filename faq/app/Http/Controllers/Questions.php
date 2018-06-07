<?php

namespace App\Http\Controllers;

use App\User;
use Request;
use Illuminate\Support\Facades\DB;
use TwigBridge\Facade\Twig;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Questions extends Controller
{

   public function getunsubQuestion() {
    $sql = 'SELECT question.id as quid, question.question as question, question.visible as quvisible, author.name as author, author.email as email, answer.text as answer, subject.name as subject FROM question left join subject on question.sid=subject.id left join author on question.athid=author.id left join answer on question.aid=answer.id where question.sid is NULL';
    return DB::select($sql);
}


 public function getunpubQuestion() {
    $sql = 'SELECT question.id as quid, question.question as question, question.visible as quvisible, author.name as author, author.email as email, answer.text as answer,answer.id as aid, subject.name as subject FROM question left join subject on question.sid=subject.id left join author on question.athid=author.id left join answer on question.aid=answer.id where question.visible <>1';
    return DB::select($sql);

}


 public function getunanswQuestion() {
    $sql = 'SELECT question.id as quid, question.question as question, question.visible as quvisible, author.name as author, author.email as email, answer.text as answer, subject.name as subject FROM question left join subject on question.sid=subject.id left join author on question.athid=author.id left join answer on question.aid=answer.id where question.aid is NULL';
    return DB::select($sql);

}

 public function getQuestion($bool) {
    
    $sub = $this->getSubjects();
    
    if ($bool) {
        $v = ' and question.visible = 1';
    } else {$v = '';}
    //var_dump($sub);
        foreach ($sub as $s) {
            $sqli = 'SELECT question.id as quid, question.question as question, question.visible as quvisible, author.name as author, author.email as email, answer.text as answer,answer.id as aid, subject.name as subject, question.time as timeadd FROM question left join subject on question.sid=subject.id join author on question.athid=author.id left join answer on question.aid=answer.id where subject.id ='.$s->id.$v;

            $res = DB::select($sqli);

            $var[$s->name] = $res;
    }

    return  $var;
}

public function getSubjects() {

    $sql = 'SELECT id, name FROM subject';

    return DB::select($sql);

}


 public function getUsers() {

    $sql = 'SELECT id, name FROM users';

    return DB::select($sql);
}

 public function getAuthors() {

    $sql = 'SELECT id, name FROM author';

    return DB::select($sql);
}



 public function addQuestion($question, $authid, $subid) {

    DB::table('question')->insert(array('question' => $question, 'athid' => $authid, 'sid' => $subid));
}


 public function subjectQuestion($quid, $subid) {
    $pdo = connectPDO();
    $sql = 'UPDATE question set sid =: subid WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id"=>$quid, "subid"=>$subid]);
    $pdo = null;
}


 public function addAuthor($name, $email) {
    DB::table('author')->insert(array('name' => $name, 'email' => $email));
}

 public function getAuthor($email) {
   
    return DB::table('author')->where('email', $email)->first();

}

public function faqList() {

	 $params = array(
    'subjects' => $this->getSubjects(),
    'authuser' => Auth::id(),
    'quanda' => $this->getQuestion(true),
    'authors' => $this->getAuthors(),
            );
    return Twig::render('./index.twig', $params);
}

 public function getSubjStatistic() {
    $sql = 'SELECT count(*) as sub FROM question WHERE sid is NULL';
    $sql2 = 'SELECT count(*) as sub FROM question WHERE aid is NULL';
    $sql3 = 'SELECT count(*) as sub FROM question WHERE visible<>1';

    $var['unsub'] = DB::select($sql);
    $var['una'] = DB::select($sql2);
    $var['unv'] = DB::select($sql3);
    return  $var;
}


public function showAllAdmin() {
    
if(Auth::check()) {

    $s=$this->getSubjStatistic();
    $params = array(
    'subjects' => $this->getSubjects(),
    'authuser' => Auth::id(),
    'quanda' => $this->getQuestion(false),
    'authors' => $this->getAuthors(),
    'users' => $this->getUsers(),
    'unsub' => $this->getunsubQuestion(),
    'unans' => $this->getunanswQuestion(),
    'unpub' => $this->getunpubQuestion(),
    'unsubjected' => $s['unsub'][0]->sub,
    'unan' => $s['una'][0]->sub,
    'unv' => $s['unv'][0]->sub,

            );

    return Twig::render('./admin.twig', $params);

} else {
	return redirect('/login');
}
    
}

public function fillQuestion() {
    $auth = Request::input('authname');
    $email = Request::input('email');
    $qu = Request::input('question');
    $subid = Request::input('subjects_assign');
    $this->addAuthor($auth, $email);
    $id = $this->getAuthor($email);
    $this->addQuestion($qu, $id->id, $subid);
    return $this->faqList();
}

public function addAdmin() {
    $data = Request::input();
    User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    return $this->showAllAdmin();
}

public function delAdmin() {
    $id = Request::input('admin_id');
    DB::delete('delete from users where id = ?',[$id]);
    return $this->showAllAdmin();

}

public function newSubject() {
    $input = Request::input();
    DB::insert('insert into subject (name) values (?)', array($input['subject']));
    return $this->showAllAdmin();
}

public function delSubject() {
    $id = Request::input('sub_id');
    DB::delete('delete from subject where id = ?',[$id]);
    return $this->showAllAdmin();
}


public function pQuestion($id, $bool) {
    if($bool) {
    DB::update('update question set visible = 1 where id = ?', [$id]);
    } else {DB::update('update question set visible = 0 where id = ?', [$id]);}
    }

public function aQuestion($qid, $aid, $txt) {
    if(isset($aid)) {
    DB::update('update answer set text = ? where id = ?', [$txt, $aid]);
    } else {
   // DB::insert('insert into answer (text, published) values (?,?)', [$txt, 1]);
    $id = DB::table('answer')->insertGetId(
          ['text' => $txt, 'published' => 1]);
    DB::update('update question set aid = ? where id = ?', [$id, $qid]);
    }
}


public function chAuthQuestion($qid, $idAuth) {

    DB::update('update question set athid = ? where id = ?', [$idAuth,$qid]);

}

public function chSubQuestion($qid, $idSub) {

    DB::update('update question set sid = ? where id = ?', [$idSub,$qid]);

}

public function chQ() {
//var_dump(Request::input());

    $i = Request::input();
   switch ($i['action']) {
    case 'Убрать из публикации':
        $this->pQuestion($i['qID'], false);
        break;
    case 'Публиковать':
        $this->pQuestion($i['qID'], true);
        break;
    case 'Изменить тему':
         $this->chSubQuestion($i['qID'],$i['subjects_assign']);
        break;
    case 'Изменить автора':
         $this->chAuthQuestion($i['qID'],$i['ath_assign']);
        break;
    case 'Ответить':
        $this->aQuestion($i['qID'], $i['aID'], $i['text']) ;
        break;
}
return $this->showAllAdmin();
}
}
