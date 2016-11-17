<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Polls extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	/**
	 * Get all polls in the Polls table.
	 */
	public function getAllPolls() {
		$query = $this->db->query(
			"SELECT id, title, question
			FROM Polls;"
		);
		$rows = $query->result();
		$list = array();
		foreach ($rows as $row) {
			$list[] = array(
				'id' => $row->id ,
				'title' => $row->title,
				'question' => $row->question
			);
		}
		return $list;
	}

	/**
	 * Get a single poll from the Polls table.
	 *
	 * @param pollId The poll id being requested.
	 */
	public function getSinglePoll($pollId) {
		// Retrieve the requested poll.
		$poll = $this->db->query(
			"SELECT id, title, question
			FROM Polls
			WHERE id=?;",
			$pollId
		);
		$pollRows = $poll->result();

		// Retrieve this polls answers.
		$pollAnswers = $this->db->query(
			"SELECT id, answerid, answer
			FROM PollsAnswers
			WHERE pollid=?",
			$pollId
		);
		$pollAnswersRows = $pollAnswers->result();

		// Iterate through the answers and put them into an array.
		$answers = array();
		foreach ($pollAnswersRows as $row) {
			$answers[$row->answerid] = array(
				'id' => $row->answerid,
				'answer' => $row->answer
			);
		}

		// Create the poll object and give it the list of answers.
		$list = array();
		foreach ($pollRows as $row) {
			$list[] = array(
				'id' => $row->id ,
				'title' => $row->title,
				'question' => $row->question,
				'answers' => $answers
			);
		}
		return $list;
	}

	/**
	 * Delete poll. Not implemented.
	 */
	public function createPoll() {}

	/**
	 * Delete poll. Not implemented.
	 */
	public function replacePoll() {}

	/**
	 * Delete poll. Not implemented.
	 */
	public function deletePoll() {}

	/**
	 * Add a vote for a poll.
	 *
	 * @param ip The IP address submitted from.
	 * @param pollId The poll we're voting on.
	 * @param answerId The answer we're voting for.
	 */
	public function addVoteToPoll($ip, $pollId, $answerId) {
		$vote = array(
			'ip' => $ip,
			'pollid' => $pollId,
			'answerid' => $answerId
		);

		$this->db->insert('PollsVotes', $vote);
	}

	/**
	 * Retrieve all votes for a given poll.
	 *
	 * @param pollId Poll id to retrieve votes for.
	 */
	public function getVotesForPoll($pollId) {
		$query = $this->db->query(
			"SELECT answerid, COUNT(*) as count
			FROM PollsVotes
			WHERE pollid=?
			GROUP BY answerid;",
			$pollId
		);

		$votes = $query->result();
		$list = array();
		foreach ($votes as $row) {
			$list['votes'][$row->answerid] = intval($row->count);
		}
		return $list;
	}

	/**
	 * Clear all the votes for a given poll.
	 *
	 * @param pollId The poll id we're clearing votes for.
	 */
	public function clearVotesForPoll($pollId) {
		$query = $this->db->query(
			"DELETE
			FROM PollsVotes
			WHERE pollid=?",
			$pollId
		);
		
		$query->result();
	}
}
