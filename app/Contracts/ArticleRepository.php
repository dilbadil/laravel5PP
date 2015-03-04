<?php namespace App\Contracts;

interface ArticleRepository {
    
    /**
     * Gat all articles that has been published.
     *
     * @return Article
     */
    public function getAllPublished();

}
