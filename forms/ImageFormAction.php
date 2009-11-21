<?php
/**
 * Action that uses an image instead of a button
 * @package forms
 * @subpackage actions
 */
class ImageFormAction extends FormAction {
	protected $image, $hoverImage, $className;
	
	/**
	 * Create a new action button.
	 * @param action The method to call when the button is clicked
	 * @param title The label on the button
	 * @param image The default image to display
	 * @param hoverImage The image to display on hover
	 * @param form The parent form, auto-set when the field is placed inside a form 
	 */
	function __construct($action, $title = "", $image = "", $hoverImage = null, $className = null, $form = null) {
		$this->image = $image;
		$this->hoverImage = $hoverImage;
		$this->className = $className;
		parent::__construct($action, $title, $form);
	}
	function Field() {
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/prototype/prototype.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/behaviour/behaviour.js');
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/ImageFormAction.js');
		
		$classClause = '';
		if($this->className) $classClause = $this->className . ' ';
		if($this->hoverImage) $classClause .= 'rollover ';
		return "<input class=\"{$classClause}action\" id=\"" . $this->id() . "\" type=\"image\" name=\"{$this->name}\" src=\"{$this->image}\" title=\"{$this->title}\" alt=\"{$this->title}\" />";
	}
}

?>