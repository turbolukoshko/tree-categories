<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class MainController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function categories(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findBy(['parent' => null]);
        return $this->render('main/categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{categorySlug}", name="category")
     * @ParamConverter("category", options={"mapping":{"categorySlug":"slug"}})
     */
    public function category(Category $category)
    {
        return $this->render('main/category.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/product/{productSlug}", name="product")
     * @ParamConverter("product", options={"mapping":{"productSlug":"slug"}})
     */
    public function product(Product $product)
    {
        return $this->render('main/product.html.twig', [
            'product' => $product,
        ]);
    }

}
