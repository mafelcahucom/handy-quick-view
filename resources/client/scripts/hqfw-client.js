/**
 * Internal Dependencies.
 */
import {
	getFetch,
	getImageName,
	setAttribute,
	setFullScreen,
	isAnimationDone,
	eventListener,
} from '../../helpers';

/**
 * Strict mode.
 *
 * @since 1.0.0
 *
 * @author Mafel John Cahucom
 */
( 'use strict' ); // eslint-disable-line no-unused-expressions

/**
 * Namespace.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
const hqfw = hqfw || {};

/**
 * Holds all the prompt compnents.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.prompt = {
	/**
	 * Prompts the toaster aler type - error.
	 *
	 * @since 1.0.0
	 *
	 * @param {string} error The error name.
	 */
	errorMessage( error ) {
		const errors = [
			{
				error: 'NETWORK_ERROR',
				title: 'Network Error',
				content:
					'The network connection is lost, there might be a problem with your network.',
			},
			{
				error: 'SECURITY_ERROR',
				title: 'Security Error',
				content:
					'A security error occur. Please try again later or contact the website administrator for help.',
			},
			{
				error: 'MISSING_DATA_ERROR',
				title: 'Missing Data',
				content: 'There is a missing data that are required. Please check and try again.',
			},
		];

		const errorDetail = errors.find( ( value ) => {
			return value.error === error;
		} );

		/* eslint-disable no-undef, no-alert */
		if ( hqfwLocal.plugin.isHATFWActive || hqfwLocal.plugin.isHAPFWActive ) {
			if ( hqfwLocal.plugin.isHATFWActive ) {
				handyToasterNotifier.show( {
					type: 'alert',
					color: 'danger',
					title: errorDetail.title,
					content: errorDetail.content,
				} );
			}

			if ( hqfwLocal.plugin.isHAPFWActive ) {
				handyPopupNotifier.showAlert( {
					status: 'error',
					title: errorDetail.title,
					message: errorDetail.content,
				} );
			}
		} else {
			alert( errorDetail.content );
		}
		/* eslint-enable */
	},
};

/**
 * Holds photo slider component.
 *
 * @since 1.0.0
 */
hqfw.photoSlider = {
	/**
	 * Holds the initialize state of this object.
	 *
	 * @since 1.0.0
	 *
	 * @type {boolean}
	 */
	isInitialized: false,

	/**
	 * Holds the photo slider element.
	 *
	 * @since 1.0.0
	 *
	 * @type {Object}
	 */
	sliderElem: null,

	/**
	 * Holds the primary image source.
	 *
	 * @since 1.0.0
	 *
	 * @type {string}
	 */
	primaryImageSrc: null,

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		if ( this.construct() ) {
			this.setSlideSize();
			this.enableImageZoom();

			if ( ! this.hasInitialized() ) {
				this.navigationController();
				this.shortcutController();
				this.screenResize();
			}
		}
	},

	/**
	 * Construct.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} The flag whether the element properties is set.
	 */
	construct() {
		// Set all element property.
		if ( ! this.setElementProperties() ) {
			return false;
		}

		// Set primaryImageSrc property.
		if ( ! this.setPrimaryImageSrc() ) {
			return false;
		}

		return true;
	},

	/**
	 * Check if this object has been already initialize, and also
	 * it will set the isInitialized property to avoid multiple initialization.
	 *
	 * @since 1.0.00
	 *
	 * @return {boolean} Is object component has been initialized.
	 */
	hasInitialized() {
		const isInitialized = hqfw.photoSlider.isInitialized;
		if ( false === isInitialized ) {
			hqfw.photoSlider.isInitialized = true;
		}

		return isInitialized;
	},

	/**
	 * Set all element property values.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} Check if all property element has a value.
	 */
	setElementProperties() {
		const sliderElem = document.getElementById( 'hqfw-js-photo-slider' );
		if ( ! sliderElem ) {
			return false;
		}
		hqfw.photoSlider.sliderElem = sliderElem;

		return true;
	},

	/**
	 * Set the value of property primaryImageSrc.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} Check if the property has a value.
	 */
	setPrimaryImageSrc() {
		const sliderElem = hqfw.photoSlider.sliderElem;
		const primaryImageElem = sliderElem.querySelector( '.hqfw-photo-slider__image-primary' );
		if ( primaryImageElem ) {
			hqfw.photoSlider.primaryImageSrc = primaryImageElem.src;
			return true;
		}

		return false;
	},

	/**
	 * Set the primary images in slide and collection based on
	 * given image source.
	 *
	 * @since 1.0.0
	 *
	 * @param {string} source Contains the new image source.
	 */
	setPrimaryImage( source = '' ) {
		if ( ! source ) {
			source = hqfw.photoSlider.primaryImageSrc;
		}

		const sliderElem = hqfw.photoSlider.sliderElem;
		const primarySlideImageElem = sliderElem.querySelector(
			'.hqfw-photo-slider__image-primary'
		);
		if ( primarySlideImageElem ) {
			primarySlideImageElem.setAttribute( 'src', source );

			const primarySlideZoomImageElem = primarySlideImageElem.nextElementSibling;
			if ( primarySlideZoomImageElem ) {
				primarySlideZoomImageElem.setAttribute( 'src', source );
				primarySlideZoomImageElem.addEventListener( 'load', () => {
					jQuery( primarySlideZoomImageElem ).css(
						'width',
						primarySlideZoomImageElem.naturalWidth + 'px'
					);
					jQuery( primarySlideZoomImageElem ).css(
						'height',
						primarySlideZoomImageElem.naturalHeight + 'px'
					);
				} );
			}
		}

		const primaryCollectionImageElem = document.querySelector(
			'.hqfw-photo-slider__collection__image-primary'
		);
		if ( primaryCollectionImageElem ) {
			primaryCollectionImageElem.setAttribute( 'src', source );
		}
	},

	/**
	 * Set the all the slider slide div height and width based
	 * on the image primary.
	 *
	 * @since 1.0.0
	 */
	setSlideSize() {
		const sliderElem = hqfw.photoSlider.sliderElem;
		const slideElems = sliderElem.querySelectorAll( '.hqfw-photo-slider__slide' );
		if ( 0 === slideElems.length ) {
			return;
		}

		const primarySlideElem = slideElems[ 0 ];
		const primaryImage = primarySlideElem.querySelector( '.hqfw-photo-slider__image-primary' );
		if ( ! primaryImage ) {
			return;
		}

		const width = window.innerWidth;

		// OnResize.
		let height = primaryImage.height;
		if ( 992 < width ) {
			height = 350 > height ? 350 : height;
		}

		slideElems.forEach( ( slideElem ) => {
			slideElem.style.height = `${ height }px`;
		} );

		// OnLoad.
		primaryImage.addEventListener( 'load', () => {
			height = primaryImage.height;
			if ( 992 < width ) {
				height = 350 > height ? 350 : height;
			}

			slideElems.forEach( ( slideElem ) => {
				slideElem.style.height = `${ height }px`;
			} );
		} );
	},

	/**
	 * Get image source url and name of the current active
	 * image in the slider.
	 *
	 * @since 1.0.0
	 *
	 * @return {Object|void} The image url source and name.
	 */
	getCurrentImage() {
		const sliderElem = hqfw.photoSlider.sliderElem;
		const currentSlide = sliderElem.getAttribute( 'data-current-slide' );
		if ( '' === currentSlide ) {
			return;
		}

		const slideElems = sliderElem.querySelectorAll( '.hqfw-photo-slider__slide' );
		if ( 0 === slideElems.length ) {
			return;
		}

		const currentSlideElem = slideElems[ currentSlide ];
		if ( ! currentSlideElem ) {
			return;
		}

		const imageElem = currentSlideElem.querySelector( 'img' );
		if ( ! imageElem ) {
			return;
		}

		return {
			source: imageElem.src,
			title: imageElem.getAttribute( 'alt' ),
		};
	},

	/**
	 * Zoom in the image on mouse enter event.
	 *
	 * @since 1.0.0
	 */
	enableImageZoom() {
		// eslint-disable-next-line no-undef
		if ( hqfwLocal.setting.isZoomEnabled ) {
			jQuery( '.hqfw-image-zoom' ).zoom();
		}
	},

	/**
	 * Move the slides.
	 *
	 * @since 1.0.0
	 */
	moveSlide() {
		const sliderElem = hqfw.photoSlider.sliderElem;
		const sliderWidth = sliderElem.offsetWidth;
		const currentSlide = parseInt( sliderElem.getAttribute( 'data-current-slide' ) );
		const sliderContainerElem = sliderElem.querySelector( '.hqfw-photo-slider__container' );
		if ( sliderContainerElem ) {
			// Move the slide.
			sliderContainerElem.style.transform = `translateX(-${ currentSlide * sliderWidth }px)`;

			// Update shortcut state.
			setAttribute.elem( '.hqfw-js-photo-slider-shortcut', 'data-state', 'default' );
			setAttribute.elem(
				`.hqfw-js-photo-slider-shortcut[data-slide="${ currentSlide }"]`,
				'data-state',
				'active'
			);
		}
	},

	/**
	 * Move the slides to primary image.
	 *
	 * @since 1.0.0
	 */
	moveSlideToPrimary() {
		const sliderElem = hqfw.photoSlider.sliderElem;
		sliderElem.setAttribute( 'data-current-slide', 0 );
		hqfw.photoSlider.setPrimaryImage();
		hqfw.photoSlider.moveSlide();
	},

	/**
	 * Move the slides based on the image_id.
	 *
	 * @since 1.0.0
	 *
	 * @param {number} imageId     Contains the target image id.
	 * @param {string} imageSource Contains the image url.
	 */
	moveSlideByImageId( imageId, imageSource ) {
		if ( ! imageId || ! imageSource ) {
			return;
		}

		const sliderElem = hqfw.photoSlider.sliderElem;
		const slideElems = sliderElem.querySelectorAll( '.hqfw-photo-slider__slide' );
		if ( 0 === slideElems.length ) {
			return;
		}

		const imageIds = Array.from( slideElems ).map( ( slideElem ) => {
			return parseInt( slideElem.getAttribute( 'data-image_id' ) );
		} );

		if ( ! imageIds ) {
			return;
		}

		const currentSlide = imageIds.indexOf( imageId );
		// Move slide based on the current slide.
		if ( -1 !== currentSlide ) {
			// If the target slide is primary then set primary
			// image source to the default image source.
			if ( imageIds[ 0 ] === imageId ) {
				hqfw.photoSlider.setPrimaryImage();
			}
		}

		// Move slide to the primary slide and change the
		// primary slide and collection image source.
		if ( -1 === currentSlide ) {
			hqfw.photoSlider.setPrimaryImage( imageSource );
		}

		sliderElem.setAttribute( 'data-current-slide', -1 === currentSlide ? 0 : currentSlide );
		hqfw.photoSlider.moveSlide();
	},

	/**
	 * Holds the previous and next navigation controller event.
	 *
	 * @since 1.0.0
	 */
	navigationController() {
		eventListener( 'click', '.hqfw-js-photo-slider-controller', ( e ) => {
			const target = e.target;
			const event = target.getAttribute( 'data-event' );
			if ( [ 'prev', 'next' ].includes( event ) ) {
				const sliderElem = hqfw.photoSlider.sliderElem;
				const totalSlides = sliderElem.querySelectorAll(
					'.hqfw-photo-slider__slide'
				).length;
				const currentSlide = parseInt( sliderElem.getAttribute( 'data-current-slide' ) );
				let updatedSlideValue = currentSlide;
				/* eslint-disable indent */
				switch ( event ) {
					case 'prev':
						updatedSlideValue = 0 >= currentSlide ? totalSlides - 1 : currentSlide - 1;
						break;
					case 'next':
						updatedSlideValue = currentSlide >= totalSlides - 1 ? 0 : currentSlide + 1;
						break;
				}
				/* eslint-enable */

				sliderElem.setAttribute( 'data-current-slide', updatedSlideValue );
				hqfw.photoSlider.moveSlide();
			}
		} );
	},

	/**
	 * Holds the bullet navigation controller event.
	 *
	 * @since 1.0.0
	 */
	shortcutController() {
		eventListener( 'click', '.hqfw-js-photo-slider-shortcut', ( e ) => {
			const target = e.target;
			const state = target.getAttribute( 'data-state' );
			const slide = parseInt( target.getAttribute( 'data-slide' ) );
			if ( 'default' === state && ! isNaN( slide ) ) {
				const sliderElem = hqfw.photoSlider.sliderElem;
				sliderElem.setAttribute( 'data-current-slide', slide );
				hqfw.photoSlider.moveSlide();
			}
		} );
	},

	/**
	 * Window screen resize event.
	 *
	 * @since 1.0.0
	 */
	screenResize() {
		window.addEventListener( 'resize', () => {
			hqfw.photoSlider.setSlideSize();
		} );
	},
};

/**
 * Holds the photo box component.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.photoBox = {
	/**
	 * Holds the state of image zoom.
	 *
	 * @since 1.0.0
	 *
	 * @type {boolean}
	 */
	isZoomEnabled: false,

	/**
	 * Holds modal element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	modalElem: null,

	/**
	 * Holds viewer body element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	bodyElem: null,

	/**
	 * Holds viewer container element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	containerElem: null,

	/**
	 * Holds viewer caption element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	captionElem: null,

	/**
	 * Holds viewer image element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	imageElem: null,

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		if ( this.construct() ) {
			this.openModal();
			this.closeModal();
			this.keyPressCloseModal();
			this.toggleFullScreen();
			this.keyPressExitFullScreen();
			this.screenResize();
		}
	},

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} The flag whether the element properties is set.
	 */
	construct() {
		// Set all element properties.
		if ( ! this.setElementProperties() ) {
			return false;
		}

		return true;
	},

	/**
	 * Set all element property values.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} Check if all property element has a value.
	 */
	setElementProperties() {
		const modalElem = document.getElementById( 'hqfw-js-photobox-viewer' );
		if ( ! modalElem ) {
			return false;
		}
		hqfw.photoBox.modalElem = modalElem;

		const bodyElem = document.querySelector( '.hqfw-photobox-viewer__body' );
		if ( ! bodyElem ) {
			return false;
		}
		hqfw.photoBox.bodyElem = bodyElem;

		const containerElem = document.querySelector( '.hqfw-photobox-viewer__container' );
		if ( ! containerElem ) {
			return false;
		}
		hqfw.photoBox.containerElem = containerElem;

		const captionElem = document.getElementById( 'hqfw-js-photobox-viewer-caption' );
		if ( ! captionElem ) {
			return false;
		}
		hqfw.photoBox.captionElem = captionElem;

		const imageElem = document.getElementById( 'hqfw-js-photobox-viewer-image' );
		if ( ! imageElem ) {
			return false;
		}
		hqfw.photoBox.imageElem = imageElem;

		return true;
	},

	/**
	 * Get the current state of the modal or component.
	 *
	 * @since 1.0.0
	 *
	 * @return {string} The current state.
	 */
	getState() {
		return hqfw.photoBox.modalElem.getAttribute( 'data-state' );
	},

	/**
	 * Set the image size.
	 *
	 * @since 1.0.0
	 */
	setImageSize() {
		if ( 'show' === hqfw.photoBox.getState() ) {
			const bodyElem = hqfw.photoBox.bodyElem;
			const imageElem = hqfw.photoBox.imageElem;
			const bodyHeight = bodyElem.offsetHeight;
			let imageHeight = imageElem.naturalHeight;
			imageHeight = imageHeight > bodyHeight ? bodyHeight : imageHeight;
			imageElem.style.maxHeight = `${ imageHeight }px`;
		}
	},

	/**
	 * Check if zoom has already implemented or enabled to avoid
	 * multitple initialization.
	 *
	 * @since 1.0.00
	 *
	 * @return {boolean} Is zoom implemented.
	 */
	hasZoomEnabled() {
		const isZoomEnabled = hqfw.photoBox.isZoomEnabled;
		if ( false === isZoomEnabled ) {
			hqfw.photoBox.isZoomEnabled = true;
		}

		return isZoomEnabled;
	},

	/**
	 * Zoom in the image on photobox image.
	 *
	 * @since 1.0.0
	 */
	enableImageZoom() {
		const bodyElem = hqfw.photoBox.bodyElem;
		const containerElem = hqfw.photoBox.containerElem;
		const imageElem = hqfw.photoBox.imageElem;
		const bodyHeight = bodyElem.offsetHeight;
		const imageHeight = imageElem.naturalHeight;
		containerElem.classList.remove( 'hqfw-photobox-zoom' );
		if ( imageHeight > bodyHeight ) {
			// Enable zoom.
			containerElem.classList.add( 'hqfw-photobox-zoom' );

			// Call only this .zoom event once.
			if ( ! hqfw.photoBox.hasZoomEnabled() ) {
				// eslint-disable-next-line no-undef
				if ( hqfwLocal.setting.isZoomEnabled ) {
					jQuery( '.hqfw-photobox-zoom' ).zoom( {
						on: 'grab',
					} );
				}
			}
		}
	},

	/**
	 * Hide the photo box viewier modal.
	 *
	 * @since 1.0.0
	 */
	hideModal() {
		const modalElem = hqfw.photoBox.modalElem;
		const modalState = modalElem.getAttribute( 'data-state' );
		if ( 'show' === modalState ) {
			setFullScreen.disable();
			modalElem.setAttribute( 'data-state', 'hide' );
		}
	},

	/**
	 * Opem the photo box viewer modal
	 *
	 * @since 1.0.0
	 */
	openModal() {
		eventListener( 'click', '#hqfw-js-photobox-trigger-btn', () => {
			const image = hqfw.photoSlider.getCurrentImage();
			if ( ! image ) {
				return;
			}

			const modalElem = hqfw.photoBox.modalElem;
			const captionElem = hqfw.photoBox.captionElem;
			const imageElems = modalElem.querySelectorAll( 'img' );
			if ( 0 === imageElems.length ) {
				return;
			}

			const fullScreenBtnElem = document.getElementById( 'hqfw-js-photobox-fullscreen-btn' );
			if ( fullScreenBtnElem ) {
				fullScreenBtnElem.setAttribute( 'data-event', 'show' );
				fullScreenBtnElem.setAttribute( 'aria-label', 'Fullscreen' );
				fullScreenBtnElem.setAttribute( 'title', 'Fullscreen' );
			}

			const imageName = getImageName( image.source );
			captionElem.textContent = ! image.title ? imageName : image.title;
			modalElem.setAttribute( 'data-state', 'show' );

			imageElems.forEach( ( imageElem, index ) => {
				imageElem.setAttribute( 'src', image.source );
				imageElem.setAttribute( 'alt', image.title );
				imageElem.setAttribute( 'title', image.title );

				if ( 0 === index ) {
					imageElem.addEventListener( 'load', () => {
						// Set image size.
						hqfw.photoBox.setImageSize();

						// Enable zoom.
						hqfw.photoBox.enableImageZoom();
					} );
				}
			} );
		} );
	},

	/**
	 * Close the photo box viewer moda via click event.
	 *
	 * @since 1.0.0
	 */
	closeModal() {
		eventListener( 'click', '#hqfw-js-photobox-close-btn', () => {
			hqfw.photoBox.hideModal();
		} );
	},

	/**
	 * Close photo box viewer by key press (ESC) event.
	 *
	 * @since 1.0.0
	 */
	keyPressCloseModal() {
		document.addEventListener( 'keydown', ( e ) => {
			if ( 'Escape' === e.key ) {
				setTimeout( () => {
					hqfw.photoBox.hideModal();
				}, 300 );
			}
		} );
	},

	/**
	 * Toggle document full screen depeneds on the current event.
	 *
	 * @since 1.0.0
	 */
	toggleFullScreen() {
		eventListener( 'click', '#hqfw-js-photobox-fullscreen-btn', ( e ) => {
			const target = e.target;
			const event = target.getAttribute( 'data-event' );
			if ( ! [ 'show', 'exit' ].includes( event ) ) {
				return;
			}

			if ( 'show' === event ) {
				setFullScreen.enable();
			}

			if ( 'exit' === event ) {
				setFullScreen.disable();
			}

			const latestEvent = 'show' === event ? 'exit' : 'show';
			const latestLabel = 'show' === event ? 'Fullscreen Exit' : 'Fullscreen';
			target.setAttribute( 'data-event', latestEvent );
			target.setAttribute( 'aria-label', latestLabel );
			target.setAttribute( 'title', latestLabel );

			// Set image size.
			hqfw.photoBox.setImageSize();
		} );
	},

	/**
	 * Fire key event using (Esc) key during leaving fullscreen mode.
	 *
	 * @since 1.0.0
	 */
	keyPressExitFullScreen() {
		const vendorPrefix = [ '', 'webkit', 'moz', 'ms' ];
		vendorPrefix.forEach( ( prefix ) => {
			document.addEventListener( `${ prefix }fullscreenchange`, () => {
				if (
					! document.fullscreenElement &&
					! document.webkitIsFullScreen &&
					! document.mozFullScreen &&
					! document.msFullscreenElement
				) {
					const fullScreenBtnElem = document.getElementById(
						'hqfw-js-photobox-fullscreen-btn'
					);
					if ( fullScreenBtnElem ) {
						fullScreenBtnElem.setAttribute( 'data-event', 'show' );
						fullScreenBtnElem.setAttribute( 'aria-label', 'Fullscreen' );
						fullScreenBtnElem.setAttribute( 'title', 'Fullscreen' );
					}
				}
			} );
		} );
	},

	/**
	 * Screen resize event.
	 *
	 * @since 1.0.0
	 */
	screenResize() {
		window.addEventListener( 'resize', () => {
			hqfw.photoBox.setImageSize();
		} );
	},
};

/**
 * Holds variation component.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.variation = {
	/**
	 * Holds variation form element.
	 *
	 * @since 1.0.0
	 *
	 * @type {Object}
	 */
	variationFormElem: null,

	/**
	 * Call to initialize.
	 *
	 * @since 1.0.0
	 */
	__init() {
		if ( this.construct() ) {
			this.variationForm();
			this.variationIdInputListener();
			this.variatioWrapListener();
		}
	},

	/**
	 * Construct.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} The flag whether the variation form is set.
	 */
	construct() {
		// Set variation form.
		if ( ! this.setVariationForm() ) {
			return false;
		}

		return true;
	},

	/**
	 * Set the variation form element property.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} Check if the .variations_form has found.
	 */
	setVariationForm() {
		const viewerElem = document.getElementById( 'hqfw-js-viewer-content' );
		if ( ! viewerElem ) {
			return false;
		}

		const variationFormElem = viewerElem.querySelector( '.variations_form' );
		if ( ! variationFormElem ) {
			return false;
		}

		hqfw.variation.variationFormElem = variationFormElem;
		return true;
	},

	/**
	 * Holds the variation form event.
	 *
	 * @since 1.0.0
	 */
	variationForm() {
		jQuery( hqfw.variation.variationFormElem ).wc_variation_form();
	},

	/**
	 * Watch the variation id input dropdown change value.
	 *
	 * @since 1.0.0
	 */
	variationIdInputListener() {
		const variationFormElem = hqfw.variation.variationFormElem;
		const variationIdFormElem = variationFormElem.querySelector( 'input[name="variation_id"]' );
		if ( variationIdFormElem ) {
			jQuery( variationFormElem ).on( 'woocommerce_variation_select_change', () => {
				setTimeout( () => {
					const variationId = variationIdFormElem.value;
					if ( ! variationId ) {
						// Move the photo slider to primary image.
						hqfw.photoSlider.moveSlideToPrimary();

						// Update the product summary height.
						hqfw.quickView.setProductSummaryBodyHeight();
					}
				}, 200 );
			} );
		}
	},

	/**
	 * Watch the variation form if there's a new selected variation.
	 *
	 * @since 1.0.0
	 */
	variatioWrapListener() {
		const variationFormElem = hqfw.variation.variationFormElem;
		const variationWrapElem = variationFormElem.querySelector( '.single_variation_wrap' );
		if ( variationWrapElem ) {
			jQuery( variationWrapElem ).on( 'show_variation', ( event, variation ) => {
				// Move photo slider based on the image id and source.
				hqfw.photoSlider.moveSlideByImageId( variation.image_id, variation.image.full_src );

				// Update the product summary height.
				hqfw.quickView.setProductSummaryBodyHeight();
			} );
		}
	},
};

/**
 * Holds quick view component.
 *
 * @since 1.0.0
 */
hqfw.quickView = {
	/**
	 * Holds all product id.
	 *
	 * @since 1.0.0
	 *
	 * @type {Array}
	 */
	productIds: [],

	/**
	 * Holds the modal element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	modalElem: null,

	/**
	 * Holds the content viewer element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	viewerElem: null,

	/**
	 * Holds the product viewer element.
	 *
	 * @since 1.0.0
	 *
	 * @type {HTMLElement}
	 */
	viewerProductElem: null,

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		if ( this.construct() ) {
			this.openModal();
			this.closeModal();
			this.autoCloseModal();
			this.keyPressCloseModal();
			this.slideNavigation();
			this.screenResize();
			this.setSlideNavigationVisibility();
			this.setProductGalleryTriggerIcon();
		}
	},

	/**
	 * Construct.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} The flag whether properties as set.
	 */
	construct() {
		// Set all elements property.
		if ( ! this.setElementProperties() ) {
			return false;
		}

		// Set productIds property.
		this.setProductIds();

		return true;
	},

	/**
	 * Set all element property values.
	 *
	 * @since 1.0.0
	 *
	 * @return {boolean} Check if all property element has a value.
	 */
	setElementProperties() {
		const modalElem = document.getElementById( 'hqfw-js-modal' );
		if ( ! modalElem ) {
			return false;
		}
		hqfw.quickView.modalElem = modalElem;

		const viewerElem = document.getElementById( 'hqfw-js-viewer-content' );
		if ( ! viewerElem ) {
			return false;
		}
		hqfw.quickView.viewerElem = viewerElem;

		const viewerProductElem = document.getElementById( 'hqfw-js-viewer-product' );
		if ( ! viewerProductElem ) {
			return false;
		}
		hqfw.quickView.viewerProductElem = viewerProductElem;

		return true;
	},

	/**
	 * Set and gather all product ids from the front-end
	 * quick view button.
	 *
	 * @since 1.0.0
	 */
	setProductIds() {
		const quickViewBtnElems = document.querySelectorAll( '.hqfw-js-quick-view-btn' );
		if ( 0 < quickViewBtnElems.length ) {
			quickViewBtnElems.forEach( ( quickViewBtnElem ) => {
				const productId = parseInt( quickViewBtnElem.getAttribute( 'data-product_id' ) );
				if ( ! isNaN( productId ) && 0 < productId ) {
					const productIds = hqfw.quickView.productIds;
					if ( ! productIds.includes( productId ) ) {
						hqfw.quickView.productIds.push( productId );
					}
				}
			} );
		}
	},

	/**
	 * Set the height of product summary section.
	 *
	 * @since 1.0.0
	 */
	setProductSummaryBodyHeight() {
		if ( 992 >= window.innerWidth ) {
			return;
		}

		const viewerProductElem = hqfw.quickView.viewerProductElem;
		const galleryElem = viewerProductElem.querySelector( '.hqfw-product__gallery' );
		if ( ! galleryElem ) {
			return;
		}

		const summaryBodyElem = viewerProductElem.querySelector( '.hqfw-product__summary__body' );
		if ( ! summaryBodyElem ) {
			return;
		}

		let headHeight = 0;
		const summaryHeadElem = viewerProductElem.querySelector( '.hqfw-product__summary__head' );
		if ( summaryHeadElem ) {
			headHeight = summaryHeadElem.offsetHeight;
		}

		setTimeout( () => {
			const galleryHeight = galleryElem.clientHeight;
			summaryBodyElem.style.maxHeight = `${ galleryHeight - headHeight }px`;
		}, 300 );
	},

	/**
	 * Set the product viewer height in mobile state.
	 *
	 * @since 1.0.0
	 */
	setProductViewerMobileHeight() {
		const modalElem = hqfw.quickView.modalElem;
		const modalState = modalElem.getAttribute( 'data-state' );
		if ( 'show' !== modalState ) {
			return;
		}

		const productViewerElem = modalElem.querySelector( '.hqfw-product' );
		if ( productViewerElem ) {
			const width = window.innerWidth;
			const height = window.innerHeight;
			if ( 992 >= width && 850 >= height ) {
				productViewerElem.style.height = `${ height - 40 }px`;
			} else {
				productViewerElem.style.height = 'auto';
			}
		}
	},

	/**
	 * Set or override the maginify icon in woocommerce-product-gallery__trigger.
	 *
	 * @since 1.0.0
	 */
	setProductGalleryTriggerIcon() {
		setTimeout( () => {
			const galleryTriggerElems = document.querySelectorAll(
				'a.woocommerce-product-gallery__trigger'
			);
			if ( 0 === galleryTriggerElems.length ) {
				return;
			}

			Array.from( galleryTriggerElems ).forEach( ( galleryTriggerElem ) => {
				// eslint-disable-next-line no-undef
				galleryTriggerElem.innerHTML = hqfwLocal.icon.searchPlus;
			} );
		}, 300 );
	},

	/**
	 * Return the previous and next product id based on
	 * the current id viewed.
	 *
	 * @since 1.0.0
	 *
	 * @param {number} productId Contains the current product id viewed.
	 * @return {Object} The previous and next product id.
	 */
	getProductIdAdjacent( productId ) {
		const ids = hqfw.quickView.productIds;
		const idsCount = ids.length;
		const data = {
			prevId: 0,
			nextId: 0,
		};

		if ( ! productId || 1 >= idsCount ) {
			return data;
		}

		const idIndex = ids.indexOf( productId );
		if ( -1 === idIndex ) {
			return data;
		}

		data.prevId = 0 < idIndex ? ids[ idIndex - 1 ] : ids[ idsCount - 1 ];
		data.nextId = idIndex < idsCount - 1 ? ids[ idIndex + 1 ] : ids[ 0 ];

		return data;
	},

	/**
	 * Set the viewer slide controller navigation attributes
	 * state and product id.
	 *
	 * @since 1.0.0
	 *
	 * @param {number} productId Contains the current product id viewed.
	 */
	setSlideNavigationProperties( productId ) {
		if ( ! productId ) {
			return;
		}

		const data = hqfw.quickView.getProductIdAdjacent( productId );

		const prevSelector = '.hqfw-js-navigation-btn[data-event="prev"]';
		setAttribute.elem( prevSelector, 'data-state', 0 < data.prevId ? 'default' : 'hidden' );
		setAttribute.elem( prevSelector, 'data-product_id', data.prevId );

		const nextSelector = '.hqfw-js-navigation-btn[data-event="next"]';
		setAttribute.elem( nextSelector, 'data-state', 0 < data.nextId ? 'default' : 'hidden' );
		setAttribute.elem( nextSelector, 'data-product_id', data.nextId );
	},

	/**
	 * Set the viewer slide controller navigation visibility
	 * based on the number of productIds property.
	 *
	 * @since 1.0.0
	 */
	setSlideNavigationVisibility() {
		const totalIds = hqfw.quickView.productIds.length;
		const state = 1 < totalIds ? 'default' : 'hidden';
		setAttribute.elem( '.hqfw-js-navigation-btn', 'data-state', state );
	},

	/**
	 * Hide quick view modal.
	 *
	 * @since 1.0.0
	 */
	async hideModal() {
		const modalElem = hqfw.quickView.modalElem;
		const viewerElem = hqfw.quickView.viewerElem;
		const modalState = modalElem.getAttribute( 'data-state' );
		if ( 'show' === modalState ) {
			viewerElem.setAttribute( 'data-state', 'hidden' );
			const isDone = await isAnimationDone( viewerElem );
			if ( isDone ) {
				modalElem.setAttribute( 'data-state', 'hide' );
			}
		}
	},

	/**
	 * Directly opened using the quick view button.
	 *
	 * @since 1.0.0
	 */
	openModal() {
		eventListener( 'click', '.hqfw-js-quick-view-btn', async ( e ) => {
			const target = e.target;
			const modalElem = hqfw.quickView.modalElem;
			const viewerElem = hqfw.quickView.viewerElem;
			const viewerProductElem = hqfw.quickView.viewerProductElem;
			const productId = parseInt( target.getAttribute( 'data-product_id' ) );
			if ( ! productId || isNaN( productId ) ) {
				return;
			}

			// Set navigation properties.
			hqfw.quickView.setSlideNavigationProperties( productId );

			// Show quick view modal.
			modalElem.setAttribute( 'data-state', 'show' );
			viewerElem.setAttribute( 'data-state', 'loading' );

			// Get the product content.
			const res = await getFetch( {
				// eslint-disable-next-line no-undef
				nonce: hqfwLocal.nonce.getProductContent,
				action: 'hqfw_get_product_content',
				productId,
			} );

			if ( true === res.success ) {
				if ( 'SUCCESSFULLY_RETRIEVED' === res.data.response ) {
					// Inject product content.
					viewerProductElem.innerHTML = res.data.content;
					viewerElem.setAttribute( 'data-state', 'prepare' );

					hqfw.photoSlider.init();

					// Initialize variation form.
					hqfw.variation.__init();

					// Update the product summary height.
					hqfw.quickView.setProductSummaryBodyHeight();

					// Show product viewer.
					setTimeout( () => {
						viewerElem.setAttribute( 'data-state', 'default' );
					}, 500 );

					// Resize at mobile state.
					hqfw.quickView.setProductViewerMobileHeight();

					// eslint-disable-next-line no-undef
					if ( hqfwLocal.plugin.isHVTFWActive ) {
						window.handyVariationTable.setContainerSize();
					}

					return;
				}
			} else {
				hqfw.prompt.errorMessage( res.data.error );
			}

			// Hide modal.
			modalElem.setAttribute( 'data-state', 'hide' );
		} );
	},

	/**
	 * Close quick view modal via click event.
	 *
	 * @since 1.0.0
	 */
	closeModal() {
		eventListener( 'click', '.hqfw-js-close-modal', async () => {
			hqfw.quickView.hideModal();
		} );
	},

	/**
	 * Close quick view modal after adding to cart event.
	 *
	 * @since 1.0.0
	 */
	autoCloseModal() {
		jQuery( 'body' ).on( 'added_to_cart', () => {
			hqfw.quickView.hideModal();
		} );
	},

	/**
	 * Close quick view modal by key press (ESC) event.
	 *
	 * @since 1.0.0
	 */
	keyPressCloseModal() {
		document.addEventListener( 'keydown', ( e ) => {
			if ( 'Escape' === e.key ) {
				// Close first if photobox state is hide.
				if ( 'hide' === hqfw.photoBox.getState() ) {
					hqfw.quickView.hideModal();
				}
			}
		} );
	},

	/**
	 * Update the product content based on previous and next product.
	 *
	 * @since 1.0.0
	 */
	slideNavigation() {
		eventListener( 'click', '.hqfw-js-navigation-btn', async ( e ) => {
			const target = e.target;
			const modalElem = hqfw.quickView.modalElem;
			const viewerElem = hqfw.quickView.viewerElem;
			const viewerProductElem = hqfw.quickView.viewerProductElem;
			const event = target.getAttribute( 'data-event' );
			const productId = parseInt( target.getAttribute( 'data-product_id' ) );
			if ( ! [ 'prev', 'next' ].includes( event ) || ! productId || isNaN( productId ) ) {
				return;
			}

			// Set navigation properties.
			hqfw.quickView.setSlideNavigationProperties( productId );

			// Set product viewer to loading.
			viewerElem.setAttribute( 'data-state', 'loading' );

			// Disable navigation button.
			setAttribute.elem( '.hqfw-js-navigation-btn', 'data-state', 'disabled' );

			// Get the product content.
			const res = await getFetch( {
				// eslint-disable-next-line no-undef
				nonce: hqfwLocal.nonce.getProductContent,
				action: 'hqfw_get_product_content',
				productId,
			} );

			if ( true === res.success ) {
				if ( 'SUCCESSFULLY_RETRIEVED' === res.data.response ) {
					// Inject product content.
					viewerProductElem.innerHTML = res.data.content;
					viewerElem.setAttribute( 'data-state', 'prepare' );

					// Initialize photo slider.
					hqfw.photoSlider.init();

					// Initialize variation form.
					hqfw.variation.__init();

					// Update the product summary height.
					hqfw.quickView.setProductSummaryBodyHeight();

					// Display product viewer.
					setTimeout( () => {
						viewerElem.setAttribute( 'data-state', 'display' );
					}, 500 );

					// Enable navigation button.
					setAttribute.elem( '.hqfw-js-navigation-btn', 'data-state', 'default' );

					// Resize at mobile state.
					hqfw.quickView.setProductViewerMobileHeight();

					return;
				}
			} else {
				hqfw.prompt.errorMessage( res.data.error );
			}

			// Hide modal.
			modalElem.setAttribute( 'data-state', 'hide' );
		} );
	},

	/**
	 * Update the width and height of the product viewer.
	 *
	 * @since 1.0.0
	 */
	screenResize() {
		window.addEventListener( 'resize', () => {
			hqfw.quickView.setProductViewerMobileHeight();
		} );
	},
};

/**
 * Is Dom Ready.
 *
 * @since 1.0.0
 */
hqfw.domReady = {
	/**
	 * Execute the code when dom is ready.
	 *
	 * @param {Function} func Contains the callback function.
	 * @return {Function|void} The callback function.
	 */
	execute( func ) {
		if ( 'function' !== typeof func ) {
			return;
		}

		if ( 'interactive' === document.readyState || 'complete' === document.readyState ) {
			return func();
		}

		document.addEventListener( 'DOMContentLoaded', func, false );
	},
};

/**
 * Initialize App.
 *
 * @since 1.0.0
 */
hqfw.domReady.execute( () => {
	Object.entries( hqfw ).forEach( ( fragment ) => {
		if ( 'init' in fragment[ 1 ] ) {
			fragment[ 1 ].init();
		}
	} );
} );
