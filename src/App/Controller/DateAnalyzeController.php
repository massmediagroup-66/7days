<?php

namespace App\Controller;

use App\Form\DateAnalyze\DateInputType;
use App\Model\DateAnalyze\DateInputModel;
use Domain\DateAnalyze\DateAnalyzeManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DateAnalyzeController extends AbstractController
{
    /**
     * @Route("/date-analyze", name="data_analyze")
     */
    public function index(Request $request, DateAnalyzeManager $dateAnalyzeManager): Response
    {
        $model = new DateInputModel();
        $form = $this->createForm(DateInputType::class, $model);

        $form->handleRequest($request);

        $isValid = $form->isSubmitted() && $form->isValid();

        return $this->renderForm('data_analyze/index.html.twig', [
            'model_form' => $form,
            'is_valid' => $isValid,
            'input_model' => $model,
            'result_model' => $isValid ? $dateAnalyzeManager->getAnalyzeResultModel($model) : null,
        ]);
    }
}
