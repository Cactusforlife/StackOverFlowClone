<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 31-12-2018
 * Time: 0:32
 */

namespace App\Infrastructure\Persistence\Doctrine\Question;


use App\Domain\Question\Question;
use App\Domain\Question\QuestionId;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManager;

class DoctrineQuestionRepository implements QuestionRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Question $question
     * @return Question
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function add(Question $question): Question
    {
        $this->entityManager->persist($question);
        $this->entityManager->flush($question);

        return $question;
    }

    /**
     * @param Question $question
     * @return Void
     * @throws \Doctrine\ORM\ORMException
     */
    public function remove(Question $question): Void
    {
        $this->entityManager->remove($question);
    }

    /**
     * @param Question $question
     * @return Question
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(Question $question): Question
    {
        $this->entityManager->flush($question);
    }

    /**
     * @param QuestionId $questionId
     * @return Question
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function withQuestionId(QuestionId $questionId): Question
    {
        $question = $this->entityManager->find(Question::class, $questionId);

        if(! $question instanceof Question)
        {
            throw new \RuntimeException(
                "Question not Found"
            );
        }

        return $question;
    }
}