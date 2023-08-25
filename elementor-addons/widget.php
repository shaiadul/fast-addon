<?php
class Shaiadul_team_members extends \Elementor\Widget_Base {

	public function get_name() {
		return 'shaiadul_team_members';
	}

	public function get_title() {
		return esc_html__( 'Team Members', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'basic' ];
	}


	// register control here 

	protected function register_controls(){

		// Content Tab Start

		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Content', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Shaiadul Bashar', 'elementor-addon' ),
			]
		);
		$this->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'elementor-addon' ),
			]
		);
		$this->add_control(
			'photo',
			[
				'label' => esc_html__( 'photo', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,	
				
			]
		);
		

		$this->end_controls_section();

		// Content Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="shaiadul_team">
			<div class="shaiadul_team_photo">
				<?php echo wp_get_attachment_image( $settings['photo']['id'], 'large' ); ?>
			</div>
			<div class="shaiadul_team_content">
				<h2><?php echo $settings['title']; ?></h2>

				<?php if(array_key_exists( 'designation', $settings) && !empty($settings['designation'])) : ?>
				<p><?php echo $settings['designation']; ?></p>
				<?php endif; ?> 

			</div>
		</div>

		<?php
	}
}