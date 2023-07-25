<?php

namespace App\Admin\Controllers;

use App\Models\ResumeEduction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ResumeEductionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ResumeEduction';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ResumeEduction());

        $grid->column('id', __('Id'));
        $grid->column('rcid', __('Rcid'));
        $grid->column('degree', __('Degree'));
        $grid->column('year_from', __('Year from'));
        $grid->column('year_to', __('Year to'));
        $grid->column('institution', __('Institution'));
        $grid->column('description', __('Description'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(ResumeEduction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('rcid', __('Rcid'));
        $show->field('degree', __('Degree'));
        $show->field('year_from', __('Year from'));
        $show->field('year_to', __('Year to'));
        $show->field('institution', __('Institution'));
        $show->field('description', __('Description'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ResumeEduction());

        $form->number('rcid', __('Rcid'));
        $form->text('degree', __('Degree'));
        $form->datetime('year_from', __('Year from'))->default(date('Y-m-d H:i:s'));
        $form->datetime('year_to', __('Year to'))->default(date('Y-m-d H:i:s'));
        $form->text('institution', __('Institution'));
        $form->text('description', __('Description'));

        return $form;
    }
}
