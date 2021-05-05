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
        // Create the view object
        $view = View::forge('book/index');

        // fetch the book from database and set it to the view
        $books = Model_Book::find('all');
        $view->set('books', $books);

        // set the template variables
        $this->template->title = "Book index page";
        $this->template->content = $view;
    }
}