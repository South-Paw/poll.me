<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	/**
	 * GET request for all available polls.
	 *
	 * @return 200 OK Header and a json encoded list of all polls.
	 */
	public function getPolls() {
		$this->load->model('polls');

		$polls = $this->polls->getAllPolls();

		echo json_encode($polls);
	}

	/**
	 * GET request for an available poll and it's answers.
	 *
	 * @param pollId Id of the poll being requested.
	 * @return 200 OK Header and a json encoded poll object.
	 */
	public function getPoll($pollId=null) {
		$this->load->model('polls');

		if ($pollId == null) {
			show_404();
		} else {
			$poll = $this->polls->getSinglePoll($pollId);

			echo json_encode($poll);
		}
	}

	/**
	 * POST request to create a new poll.
	 *
	 * @return 201 CREATED and 'location' header to new poll if successful.
	 */
	public function postPoll() {
		// not implemented
	}

	/**
	 * PUT request to edit an existing poll.
	 *
	 * @param pollId Id of the poll we wish to update.
	 * @return 200 OK if successful.
	 */
	public function putPoll($pollId) {
		// not implemented
	}

	/**
	 * DELETE request to delete an existing poll.
	 *
	 * @param pollId Id of the poll we wish to delete.
	 * @return 200 OK if successful.
	 */
	public function deletePoll($pollId) {
		// not implemented
	}

	/**
	 * POST request for making a vote on a poll.
	 *
	 * Note: this should probably return a 400 Bad Request header when a vote
	 * 		 is invalid.
	 *
	 * @param pollId The id of the poll we're voting on.
	 * @param answerId The answerid we're voting on.
	 * @return 404 if invalid pollId or answerId. 200 OK if POST successful.
	 */
	public function postVote($pollId=null, $answerId=null) {
		$this->load->model('polls');

		if ($pollId == null || $answerId == null) {
			show_404();
		} else {
			$poll = $this->polls->getSinglePoll($pollId);

			// If we got a poll back with this id and it's id matches the given one
			if (isset($poll[0]) && $poll[0]['id'] == $pollId) {
				// If this poll has answers and has an answerid that matches our given one
				if (isset($poll[0]['answers']) && isset($poll[0]['answers'][$answerId])) {
					// Then place a vote for this ip address
					$ip = $_SERVER['REMOTE_ADDR'];
					$this->polls->addVoteToPoll($ip, $pollId, $answerId);
					header('HTTP/1.1 200 OK');
				} else {
					show_404();
				}
			} else {
				show_404();
			}
		}
	}

	/**
	 *
	 */
	public function getVotes($pollId=null) {
		$this->load->model('polls');

		if ($pollId == null) {
			show_404();
		} else {
			$votes = $this->polls->getVotesForPoll($pollId);

			echo json_encode($votes);
		}
	}

    /**
     *
     */
	public function deleteVotes($pollId) {
		$this->load->model('polls');

		$votes = $this->polls->clearVotesForPoll($pollId);

		header('HTTP/1.1 200 OK');
	}
}
