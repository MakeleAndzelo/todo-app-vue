<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class TasksController extends FOSRestController
{
    public function getTasksAction()
    {
        $tasks = $this->getDoctrine()->getRepository("AppBundle:Task")->findAll();

        return $tasks;
    }

    public function patchTaskAction(int $id)
    {
        $task = $this->getDoctrine()->getRepository("AppBundle:Task")->findOneBy(['id' => $id]);
        $task->setIsFinished(true);

        $em = $this->getDoctrine()->getManager();
        $em->flush();
    }

    public function deleteTaskAction(int $id)
    {
        $task = $this->getDoctrine()->getRepository("AppBundle:Task")->findOneBy(['id' => $id]);

        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();
    }
}