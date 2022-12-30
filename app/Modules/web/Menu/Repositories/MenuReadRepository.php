<?php

namespace App\Modules\web\Menu\Repositories;

use App\Base\Helper;
use App\Base\Repositories\BaseRepository;
use App\Modules\web\Menu\Models\Menu;
use App\Modules\web\Menu\Repositories\Contracts\IMenuReadRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MenuReadRepository extends BaseRepository implements IMenuReadRepository
{
    public function __construct(Menu $model)
    {
        parent::__constructor($model);
    }

    public function list(): Collection
    {
        return $this->model::query()->get();
    }

    public function getById(int $id): Model
    {
        return $this->findModel($id);
    }

    public function getAsMenu(): array
    {
        $parent_id = 1;
        $lang_code = "en";

        $sql = <<<SQL
        WITH RECURSIVE menu_tree AS (
                    select id,
                    unique_name,
                    parent_id,
                    status
                    FROM menu
                    where parent_id = ?

                    UNION ALL

                    select child.id,
                    child.unique_name,
                    child.parent_id,
                    child.status
                    FROM menu AS child
                    JOIN menu_tree AS parent ON parent.id = child.parent_id
                )
                select
                menu_tree.id as id,
                menu_tree.unique_name as cat_name,
                menu_tree.parent_id as parent_id,
                menu_tree.status as status,
                ct.name as menu_name
                from menu_tree
                join category_translations ct on menu_tree.id = ct.category_id
                where ct.lang_code = ? AND menu_tree.status = 1
                order by parent_id asc;
SQL;

        $categories = DB::select(DB::raw($sql), [$parent_id, $lang_code]);

        $menu = Helper::buildMenu($categories, 1);

        return $menu;
    }
}
