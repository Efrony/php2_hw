<?php

namespace app\model\repositories;

use app\model\entities\Comments;
use app\model\Repository;

class CommentsRepository extends Repository
{
    public function getNameTable()
    {
        return 'comments';
    }


    public function getEntityClass()
    {
        return Comments::class;
    }
}
