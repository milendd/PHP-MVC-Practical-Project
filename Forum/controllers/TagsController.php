<?php

class TagsController extends BaseController {
	private $tagsModel;

    public function onInit() {
        $this->title = 'Tags';
        $this->tagsModel = new TagsModel();
    }

    public function index() {
        $this->tags = $this->tagsModel->getAll();
    }
	
	public function view($tagId) {
		$tag = $this->tagsModel->find($tagId);
		if (!$tag){
			$this->addErrorMessage("Invalid tag!");
			$this->redirect("tags");
		}
		
		$this->title = $tag['name'];
		$this->questions = $this->tagsModel->getQuestions($tagId);
	}
}