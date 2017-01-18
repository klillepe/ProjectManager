<?php
namespace App\Model\Entity;

use Cake\I18n\Time;
use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string $c_name
 * @property int $user_id
 * @property int $capacity
 * @property string $estimated_time
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $deadline
 * @property string $p_status
 *
 * @property \App\Model\Entity\User $user
 */
class Project extends Entity
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

    protected $_virtual = ['time_spent', 'date_status'];

    // Difference between capacity and time spent
    protected function _getTimeSpent(){
            return $this->_properties['start_date']->diffInDays(Time::now()) * 8;
    }

    // 
    protected function _getProjectStatus() {
        $stop = $this->_properties['deadline'];
        // Project status RED
        if($stop->isPast() || $this->time_spent >= $this->_properties['capacity']) {
            return "red";
        // Project status YELLOW
        } elseif($stop->isThisWeek() && $this->time_passed < $this->_properties['capacity']) {
            return "yellow";
        // Project status GREEN
        } else {
            return "green";
        }
    }
}
