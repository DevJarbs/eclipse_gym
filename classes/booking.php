<?php 
require_once 'db_controller.php';
class Booking{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function bookTraining($trainer, $training_option, $start_date, $end_date, $start_time, $end_time, $rate, $total_cost,$user_id){
       try{
        $stmt = $this->db->prepare("CALL book_training(:trainer, :training_option, :start_date, :end_date, :start_time, :end_time, :rate_per_session, :total_cost, :user_id)");
        $stmt->execute(['trainer'=>$trainer, 'training_option'=>$training_option, 'start_date'=>$start_date, 'end_date'=>$end_date,'start_time'=>$start_time,'end_time'=>$end_time,'rate_per_session'=>$rate,'total_cost'=>$total_cost,'user_id' => $user_id]);
        return ['status' => true, 'message' => 'Booking successfully added!'];
       }catch(PDOException $e){
        return ['status' => false, 'message' => 'Error'. $e->getMessage()];
       }
    }
    public function viewBookings($user_id){
        $query = "SELECT * FROM view_bookings WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateBooking($bookingId, $trainer, $trainingOption, $startDate, $endDate, $startTime, $endTime, $ratePerSession, $totalCost, $feedback) {
        try {
            $stmt = $this->db->prepare("CALL sp_update_booking(:booking_id, :trainer, :training_option, :start_date, :end_date, :start_time, :end_time, :rate_per_session, :total_cost, :feedback)");
            $stmt->execute([
                ':booking_id' => $bookingId,
                ':trainer' => $trainer,
                ':training_option' => $trainingOption,
                ':start_date' => $startDate,
                ':end_date' => $endDate,
                ':start_time' => $startTime,
                ':end_time' => $endTime,
                ':rate_per_session' => $ratePerSession,
                ':total_cost' => $totalCost,
                ':feedback' => $feedback
            ]);
        return ['status'=> true, 'message'=> 'Schedule updated successufully.'];

    }catch(PDOException $e){
        return ['status' => false, 'message'=> 'Something went wrong.'];
    }
}

}
?>