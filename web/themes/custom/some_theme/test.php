<?php

namespace Drupal\bad_module;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BadController extends ControllerBase {

    public function badFunction(Request $request) {
    global $user; // Глобальні змінні - погана практика
    $bad_variable = $_GET['input']; // Використання $_GET без фільтрації

    if ($bad_variable == 'test') { // == замість ===
      print 'This is bad!'; // Використання print замість t()
    }

    $data = db_query('SELECT * FROM {users}')->fetchAll(); // Використання застарілої функції
    foreach ($data as $item)
    {
      echo $item->name; // Використання echo всередині коду
    }

    return new Response('Bad Response');
  }

  function missingPublicFunction() { // Відсутність public перед методом
    return 'No visibility';
  }

}
