<?php


namespace Juinsa\controllers;

use Juinsa\Services\CategoryService;
use Juinsa\Services\ProductService;

class CategoryController extends Controller
{

    /**
     * @Inject
     * @var CategoryService
     */
    private CategoryService $categoryService;

    public function index()
    {

    }

    public function showCategoryInfo($id, $name)
    {
        $category = $this->categoryService->getCategory($id);

        $products = [];
        if(!$category) {
            $this->sessionManager->getFlashBag()->add("danger", "No se ha encontrado la categoría");
        } else {
            $products = $category->products;
        }


        $this->myRenderTemplate("category.twig.html", ["category" => $category, "products" => $products]);
    }

}