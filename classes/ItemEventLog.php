<?php


namespace classes;

class ItemEventLog {

    private int $item_event_log_id;
    private int $item_id;
    private int $employee_id;
    private string $timestamp;
    private string $change_type;
    private string $action;
    private int $update_status;
    private string $old_status;
    private string $new_status;
    private string $field;
    private string $from;
    private string $to;
    private string $note;


    public function setData(array $ResultSet) {

        $this->item_event_log_id = $ResultSet["item_event_log_id"];
        $this->item_id = $ResultSet["item_id"];
        $this->employee_id = $ResultSet["employee_id"];
        $this->timestamp = $ResultSet["timestamp"];
        $this->change_type = $ResultSet["change_type"];
        $this->action = $ResultSet["action"];
        $this->update_status = $ResultSet["update_status"];
        $this->old_status = $ResultSet["old_status"];
        $this->new_status = $ResultSet["new_status"];
        $this->field = $ResultSet["field"];
        $this->from = $ResultSet["from"];
        $this->to = $ResultSet["to"];
        $this->note = $ResultSet["note"];

    }

    public function getItemEventLogId(): int {
        return $this->item_event_log_id;
    }

    public function setItemEventLogId(int $item_event_log_id): void {
        $this->item_event_log_id = $item_event_log_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function getEmployeeId(): int {
        return $this->employee_id;
    }

    public function setEmployeeId(int $employee_id): void {
        $this->employee_id = $employee_id;
    }

    public function getTimestamp(): string {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): void {
        $this->timestamp = $timestamp;
    }

    public function getChangeType(): string {
        return $this->change_type;
    }

    public function setChangeType(string $change_type): void {
        $this->change_type = $change_type;
    }

    public function getAction(): string {
        return $this->action;
    }

    public function setAction(string $action): void {
        $this->action = $action;
    }

    public function getUpdateStatus(): int {
        return $this->update_status;
    }

    public function setUpdateStatus(int $update_status): void {
        $this->update_status = $update_status;
    }

    public function getOldStatus(): string {
        return $this->old_status;
    }

    public function setOldStatus(string $old_status): void {
        $this->old_status = $old_status;
    }

    public function getNewStatus(): string {
        return $this->new_status;
    }

    public function setNewStatus(string $new_status): void {
        $this->new_status = $new_status;
    }

    public function getField(): string {
        return $this->field;
    }

    public function setField(string $field): void {
        $this->field = $field;
    }

    public function getFrom(): string {
        return $this->from;
    }

    public function setFrom(string $from): void {
        $this->from = $from;
    }

    public function getTo(): string {
        return $this->to;
    }

    public function setTo(string $to): void {
        $this->to = $to;
    }

    public function getNote(): string {
        return $this->note;
    }

    public function setNote(string $note): void {
        $this->note = $note;
    }

}