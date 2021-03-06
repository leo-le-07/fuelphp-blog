<?php

class Controller_Book extends Controller_Template {
    private $current_user;
    public $template = 'layout';

    public function before() {
        parent::before();

        // Assign current_user to the instance so controllers can use it
        $this->current_user = Auth::check() ? Model_User::find(Arr::get(Auth::get_user_id(), 1)) : null;

        Log::debug('Checking auth');
        if (!Auth::check()) {
            Log::debug('Unauthenticated! Redirect to login form');
            Response::redirect('login/login');
        }
    }

    public function action_index() {
        $books = NULL;
        $search_book_name = \Input::param('search_book_name');

        // Create the view object
        $view = View::forge('book/index');

        if (empty($search_book_name)) {
            $books = Model_Book::find('all');
        } else {
            $books = Model_Book::find('all', array(
               'where' => array(
                   array('title', 'LIKE', $search_book_name.'%')
               ),
            ));
        }

        $view->set('books', $books);
        $view->set('search_book_name', $search_book_name);

        // set the template variables
        $this->template->title = "Book index page";
        $this->template->content = $view;
        $this->template->current_user = $this->current_user;

        Log::debug('Checking auth');
    }
}