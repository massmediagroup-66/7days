<?php

namespace App\Controller;

use App\Form\Task1\ModelType;
use App\Model\Task1\TaskModel;
use Domain\Task1\TaskManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Task1Controller extends AbstractController
{
    /**
     * @Route("/task1", name="task1")
     */
    public function index(Request $request, TaskManager $taskManager): Response
    {
        $model = new TaskModel();
        $form = $this->createForm(ModelType::class, $model);

        $form->handleRequest($request);

        $isValid = $form->isSubmitted() && $form->isValid();

        return $this->renderForm('task1/index.html.twig', [
            'model_form' => $form,
            'is_valid' => $isValid,
            'input_model' => $model,
            'result_model' => $isValid ? $taskManager->getResultModel($model) : null,
        ]);
    }
}
