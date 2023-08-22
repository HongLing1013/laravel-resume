<?php

namespace App\Admin\Controllers;

use App\Models\AboutCounts;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AboutCountsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '好評數量';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AboutCounts());

        /* ============
         * 禁用篩選按鈕
         * 禁用導出按鈕
         * 禁用行選擇器
         * 禁用列選擇器
         * 禁用分頁功能
         * 禁用刪除按鈕
         * ============ */

        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableColumnSelector();
        $grid->disablePagination();
        $grid->actions(function (Grid\Displayers\Actions $actions) {
           $actions->disableDelete();
        });

        $grid->column('id', __('Id'))->hide();
        $grid->column('name', __('好評類別'));
        $grid->column('icon', __('Icon'));
        $grid->column('int', __('數量'));
        $grid->column('updated_at', __('更新時間'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(AboutCounts::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('好評類別'));
        $show->field('icon', __('Icon'));
        $show->field('int', __('數量'));
        $show->field('created_at', __('創建時間'));
        $show->field('updated_at', __('更新時間'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AboutCounts());

        $form->text('name', __('好評類別'));
        $form->text('icon', __('Icon'));
        $form->text('int', __('數量'));

        if($form->isCreating()){
            $form->hidden('acid')->default('2');
        }

        return $form;
    }
}
