<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 30-12-2018
 * Time: 21:39
 */

namespace App\Infrastructure\Persistence\Doctrine\Answer;


use App\Domain\Answer\Answer;
use App\Domain\Answer\AnswerId;
use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManager;

class DoctrineAnswerRepository implements AnswerRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param Answer $answer
     * @return Answer
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function add(Answer $answer): Answer
    {
        $this->entityManager->persist($answer);
        $this->entityManager->flush();

        return $answer;
    }

    /**
     * @param Answer $answer
     * @throws \Doctrine\ORM\ORMException
     */
    public function remove(Answer $answer): Void
    {
        $this->entityManager->remove($answer);
    }

    /**
     * @param Answer $answer
     * @return Answer
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(Answer $answer): Answer
    {
        $this->entityManager->flush($answer);
        return $answer;
    }

    /**
     * @param AnswerId $answerId
     * @return Answer
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */

    public function withAnswerId(AnswerId $answerId): Answer
    {
        $answer = $this->entityManager->find(Answer::class, $answerId);

        if(! $answer instanceof Answer){
            throw new \RuntimeException(
                "Answer not Found."
            );
        }

        return $answer;
    }

    /**
     * @param Answer $answer
     * @return Answer
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function setAsCorrect(Answer $answer): Answer
    {
        $this->entityManager->flush($answer);
        return $answer;
    }

    /**
     * @param Answer $answer
     * @return Answer
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function voteUp(Answer $answer): Answer
    {
        $this->entityManager->flush($answer);
        return $answer;
    }

    /**
     * @param Answer $answer
     * @return Answer
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function voteDown(Answer $answer): Answer
    {
        $this->entityManager->flush($answer);
        return $answer;
    }
}