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
}