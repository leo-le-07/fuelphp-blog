<?php
class Controller_Book extends Controller_Template {
    public $template = 'layout';
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