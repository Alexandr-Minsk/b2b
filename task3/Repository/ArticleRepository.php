<?php

/**
 * Class ArticleRepository
 */
class ArticleRepository
{
    /**
     * 1-я функциональность: Возможность для пользователя создать новую статью 
     * @param $user
     * @param $data
     * @return boolean
     */
    public function createArticle($user, $data){
        $article = new Article($data);
        $article->setAutor($user);
        return $article->save();
    }

    /**
     * 2-я функциональность: Возможность получить автора статьи
     * @param Article $article
     * @return User
     */
    
    public function getAuthorByArticle(Article $article){
        return $article->getAuthor();
    }

    /**
     * 4-я функциональность: Возможность сменить автора статьи
     * @param Article $article
     * @param User $newAuthor
     * @return bool
     */
    public function changeAuthor(Article $article, User $newAuthor){
        $article->setAutor($newAuthor);
        return $article->save();
    }
}