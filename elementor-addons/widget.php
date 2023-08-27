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

		// create a repeater
		$this->add_control(
			'social_links',
			[
				'label' => esc_html__( 'social link', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'icon',
						'label' => esc_html__( 'Icon', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::ICONS,
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => 'https://example.com',
					],
				],
			]
		);

		// for style tab
		$this->add_control(
			'style',
			[
				'label' => esc_html__( 'Template Style', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'Style 1', 'elementor-addon' ),
					'style2' => esc_html__( 'Style 2', 'elementor-addon' ),
				],
			]
		);
		

		$this->end_controls_section();
		// Content Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="shaiadul_team shaiadul_team-<?php echo $settings['style']; ?> ">

			<div class="shaiadul_team_photo">
				<?php echo wp_get_attachment_image( $settings['photo']['id'], 'large' ); ?>
			</div>


			<div class="shaiadul_team_content ">

				<h2><?php echo $settings['title']; ?></h2>

				<?php if(array_key_exists( 'designation', $settings) && !empty($settings['designation'])) : ?>
				<p><?php echo $settings['designation']; ?></p>
				<?php endif; ?> 
				
				<div class="shaiadul_team_social">
					<?php foreach($settings['social_links'] as $link) : ?>
						<a href="<?php echo $link['link']['url']; ?>" target="_blank">
							<?php \Elementor\Icons_Manager::render_icon( $link['icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</a>
					<?php endforeach; ?>
				</div>

			</div>
		</div>

		<?php
	}
}