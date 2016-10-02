<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionsUser Entity
 *
 * @property int $question_id
 * @property int $user_id
 * @property int $is_done
 * @property int $is_correct
 * @property int $id
 *
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\User $user
 */
class QuestionsUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
