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
        $selected_category = \Input::param('selected_category');

        // Create the view object
        $view = View::forge('book/index');

        if (empty($selected_category)) {
            if (empty($search_book_name)) {
                $books = Model_Book::find('all');
            } else {
                $books = Model_Book::find('all', array(
                    'where' => array(
                        array('title', 'LIKE', $search_book_name.'%')
                    ),
                ));
            }
        } else {
            if (empty($search_book_name)) {
                $books = Model_Book::find('all', array(
                    'related' => array(
                        'category' => array(
                            'where' => array(
                                array('code', '=', $selected_category)
                            )
                        )
                    )
                ));
            } else {
                $books = Model_Book::find('all', array(
                    'where' => array(
                        array('title', 'LIKE', $search_book_name.'%')
                    ),
                    'related' => array(
                        'category' => array(
                            'where' => array(
                                array('code', '=', $selected_category)
                            )
                        )
                    )
                ));
            }
        }

        $categories = Model_Category::find('all');

        $view->set('books', $books);
        $view->set('search_book_name', $search_book_name);
        $view->set('categories', $categories);

        // set the template variables
        $this->template->title = "Book index page";
        $this->template->content = $view;
        $this->template->current_user = $this->current_user;

        Log::debug('Checking auth');
    }
    public function action_add() {

        // create a new fieldset and add book model
        $fieldset = Fieldset::forge('book')->add_model('Model_Book');
        $fieldset->delete('category_id');
        // get form from fieldset
        $form = $fieldset->form();

        // add category to the form
        $categories = Model_Category::find('all');
        $op = array();
        foreach ($categories as $category) {
            $op[$category['id']] = $category['name'];
        }

        $form->add(
            'category', '',
            array('options' => $op, 'type' => 'radio', 'value' => 'true')
        );
        // add submit button to the form
        $form->add('Submit', '', array('type' => 'submit', 'value' => 'Submit'));


        // build the form  and set the current page as action
        $formHtml = $fieldset->build(Uri::create('book/add'));
        $view = View::forge('book/add');
        $view->set('form', $formHtml, false);

        if (Input::param() != array()) {
            try {
                $book = Model_Book::forge();
                $book->title = Input::param('title');
                $book->author = Input::param('author');
                $book->price = Input::param('price');
                $book->category_id= Input::param('category');

                Log::debug('selected category '.$book->category_id);
                Log::debug('selected category '.Input::param('category'));
                $book->save();
                Response::redirect('book');
            } catch (Orm\ValidationFailed $e) {
                $view->set('errors', $e->getMessage(), false);
            }
        }
        $this->template->title = "Book add page";
        $this->template->content = $view; }
}
