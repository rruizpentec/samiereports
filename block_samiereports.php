<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block samiereports implementation.
 *
 * @package    block_samiereports
 * @copyright  2015 Planificacion de Entornos Tecnologicos SL
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Block samiereports class definition.
 *
 * This block can be added to display a link to some reports.
 *
 * @package    SAMIE
 * @copyright  2015 Planificacion de Entornos Tecnologicos SL
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_samiereports extends block_base {

    /**
     * Set the initial properties for the block
     */
    public function init() {
        $this->title = get_string('title', 'block_samiereports');
    }

    /**
     * Gets the content for this block
     *
     * @return object $this->content
     */
    public function get_content() {
        global $COURSE, $CFG;
        // Initialize the content.
        if (isset($this->content)) {
            if ($this->content !== null) {
                return $this->content;
            }
        } else {
            $this->content = new stdClass();
            $this->content->text = '';
        }
        // The user must be logged in to be able to see the block content.
        if (isloggedin()) {
            $samieconfig = get_config('package_samie');
            $baseurl = $samieconfig->baseurl;
            if (isset($baseurl) && $baseurl != '' && $baseurl != null) {
                $this->content->text .= html_writer::tag('a', get_string('menuoption', 'block_samiereports'),
                            array('href' => $CFG->wwwroot.'/blocks/samiereports/index.php?courseid='.$COURSE->id));
            } else {
                $this->content = null;
            }
        }
        return $this->content;
    }

    /**
     * Set the applicable formats for this block
     * @return array
     */
    public function applicable_formats() {
        return array(
            'all' => true,
            'site' => true,
            'site-index' => true,
            'course-view' => true,
            'course-view-social' => false,
            'mod' => true,
            'mod-quiz' => false);
    }

    /**
     * Allows the block to be added multiple times to a single page
     *
     * @return bool
     */
    public function instance_allow_multiple() {
          return false;
    }

    /**
     * This line tells Moodle that the block has a settings.php file.
     *
     * @return bool
     */
    public function has_config() {
        return false;
    }
}
