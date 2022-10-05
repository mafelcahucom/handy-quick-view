/**
 * Strict mode.
 *
 * @since 1.0.0
 *
 * @author Mafel John Cahucom
 */
'use strict';

/**
 * Namespace.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
const hqfw = hqfw || {};

/**
 * Helper.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.fn = {

	/**
	 * Global event listener delegation.
	 *
	 * @since 1.0.0
	 *
	 * @param {string}   type     Event type can be multiple seperate with space.
	 * @param {string}   selector Target element.
	 * @param {Function} callback Callback function.
	 */
	async eventListener( type, selector, callback ) {
		const events = type.split( ' ' );
		events.forEach( function( event ) {
			document.addEventListener( event, function( e ) {
				if ( e.target.matches( selector ) ) {
					callback( e );
				}
			} );
		} );
	},

	/**
	 * Fetch handler.
	 *
	 * @since 1.0.0
	 *
	 * @param {Object} params Containing the parameters.
	 * @return {Object} Fetch response
	 */
	async fetch( params ) {
		let result = {
			success: false,
			data: {
				error: 'NETWORK_ERROR',
			},
		};

		if ( this.isObjectEmpty( params ) ) {
			result.data.error = 'MISSING_DATA_ERROR';
			return result;
		}

		try {
			const response = await fetch( hqfwLocal.url, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: new URLSearchParams( params ),
			} );

			if ( response.ok ) {
				result = await response.json();
			}
		} catch ( e ) {
			console.log( 'error', e );
		}

		return result;
	},

	/**
	 * Checks if the object is empty.
	 *
	 * @since 1.0.0
	 *
	 * @param {Object} object The object to be checked.
	 * @return {boolean} Whether has empty key.
	 */
	isObjectEmpty( object ) {
		return Object.keys( object ).length === 0;
	},

	/**
	 * Return the extracted number from a string.
	 *
	 * @since 1.0.0
	 *
	 * @param {string} data The string to be filter.
	 * @return {integer} The extracted numbers from string.
	 */
	getExtractedNumbers( data ) {
		if ( ! data ) {
			return 0;
		}

		const number = parseInt( data.replace( /[^0-9]/g, '' ) );
		return ( isNaN( number ) ? 0 : number );
	},

	/**
	 * Return the image name from an image source path.
	 *
	 * @since 1.0.0
	 *
	 * @param  imagePath
	 * @params {string} imagePath The full path of the image.
	 * @return {string} The name of the image.
	 */
	getImageName( imagePath ) {
		if ( ! imagePath ) {
			return;
		}

		return imagePath.split( '/' ).pop();
	},

	/**
	 * Check if the element animation is done or into end.
	 *
	 * @since 1.0.0
	 *
	 * @param {element} element The element to be watch.
	 * @return {boolean}
	 */
	isAnimationDone( element ) {
		return new Promise( function( resolve, reject ) {
			if ( ! element ) {
				resolve( false );
			}

			element.addEventListener( 'animationend', function() {
				resolve( true );
			} );
		} );
	},

	/**
	 * Sets the attribute of target elements.
	 *
	 * @since 1.0.0
	 *
	 * @param {string} selector  The element selector.
	 * @param {string} attribute The Attribute to be set.
	 * @param {string} value     The value of the attribute.
	 */
	setAttribute( selector, attribute, value ) {
		if ( ! selector || ! attribute ) {
			return;
		}

		const elems = document.querySelectorAll( selector );
		if ( elems.length === 0 ) {
			return;
		}

		elems.forEach( function( elem ) {
			elem.setAttribute( attribute, value );
		} );
	},

	/**
	 * Remove elements based on the selector.
	 *
	 * @since 1.0.0
	 *
	 * @param {string} selector The element query selector.
	 */
	removeElements( selector ) {
		if ( ! selector ) {
			return;
		}

		const elements = document.querySelectorAll( selector );
		if ( elements.length === 0 ) {
			return;
		}

		elements.forEach( function( element ) {
			element.remove();
		} );
	},

	/**
	 * Enable the document fullscreen.
	 *
	 * @since 1.0.0
	 */
	enableFullScreen() {
		const documentElem = document.documentElement;
		if ( documentElem.requestFullscreen ) {
			documentElem.requestFullscreen();
		} else if ( documentElem.mozRequestFullScreen ) {
			documentElem.mozRequestFullScreen();
		} else if ( documentElem.webkitRequestFullscreen ) {
			documentElem.webkitRequestFullscreen();
		} else if ( documentElem.msRequestFullscreen ) {
			documentElem.msRequestFullscreen();
		}
	},

	/**
	 * Disable the document fullscreen.
	 *
	 * @since 1.0.0
	 */
	disableFullScreen() {
		if ( document.fullscreenElement ) {
			if ( document.exitFullscreen ) {
				document.exitFullscreen();
			} else if ( document.mozCancelFullScreen ) {
				document.mozCancelFullScreen();
			} else if ( document.webkitExitFullscreen ) {
				document.webkitExitFullscreen();
			}
	 	}
	},
};

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
				content: 'The network connection is lost, there might be a problem with your network.',
			},
			{
				error: 'SECURITY_ERROR',
				title: 'Security Error',
				content: 'A security error occur. Please try again later or contact the website administrator for help.',
			},
			{
				error: 'MISSING_DATA_ERROR',
				title: 'Missing Data',
				content: 'There is a missing data that are required. Please check and try again.',
			},
		];

		const errorDetail = errors.find( function( value ) {
			return ( value.error === error );
		} );

		if ( errorDetail ) {
			handyToaster.show( {
				type: 'alert',
				color: 'danger',
				title: errorDetail.title,
				content: errorDetail.content,
				duration: hqfwLocal.toaster.duration,
				allowed: hqfwLocal.toaster.isUseToaster,
			} );
		}
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
		if ( ! this.constructor() ) {
			return;
		}

		this.setSlideSize();
		this.enableImageZoom();

		if ( ! this.hasInitialized() ) {
			this.navigationController();
			this.shortcutController();
			this.screenResize();
		}
	},

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	constructor() {
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
		if ( isInitialized === false ) {
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
		// Set sliderElem property.
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
	 * @param {string} source The new image source.
	 */
	setPrimaryImage( source = '' ) {
		if ( ! source ) {
			source = hqfw.photoSlider.primaryImageSrc;
		}

		const sliderElem = hqfw.photoSlider.sliderElem;
		const primarySlideImageElem = sliderElem.querySelector( '.hqfw-photo-slider__image-primary' );
		if ( primarySlideImageElem ) {
			primarySlideImageElem.setAttribute( 'src', source );

			const primarySlideZoomImageElem = primarySlideImageElem.nextElementSibling;
			if ( primarySlideZoomImageElem ) {
				primarySlideZoomImageElem.setAttribute( 'src', source );
				primarySlideZoomImageElem.addEventListener( 'load', function() {
					jQuery( primarySlideZoomImageElem ).css( 'width', primarySlideZoomImageElem.naturalWidth + 'px' );
					jQuery( primarySlideZoomImageElem ).css( 'height', primarySlideZoomImageElem.naturalHeight + 'px' );
				} );
			}
		}

		const primaryCollectionImageElem = document.querySelector( '.hqfw-photo-slider__collection__image-primary' );
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
		if ( ! slideElems ) {
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
		if ( width > 992 ) {
			height = ( height < 350 ? 350 : height );
		}

		slideElems.forEach( function( slideElem ) {
			slideElem.style.height = `${ height }px`;
		} );

		// OnLoad.
		primaryImage.addEventListener( 'load', function() {
			height = primaryImage.height;
			if ( width > 992 ) {
				height = ( height < 350 ? 350 : height );
			}

			slideElems.forEach( function( slideElem ) {
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
	 * @return {Object} Image url source and name.
	 */
	getCurrentImage() {
		const sliderElem = hqfw.photoSlider.sliderElem;
		const currentSlide = sliderElem.getAttribute( 'data-current-slide' );
		if ( currentSlide === '' ) {
			return;
		}

		const slideElems = sliderElem.querySelectorAll( '.hqfw-photo-slider__slide' );
		if ( ! slideElems ) {
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
		if ( ! sliderContainerElem ) {
			return;
		}

		// Move the slide.
		sliderContainerElem.style.transform = `translateX(-${ currentSlide * sliderWidth }px)`;

		// Update shortcut state.
		hqfw.fn.setAttribute( '.hqfw-js-photo-slider-shortcut', 'data-state', 'default' );
		hqfw.fn.setAttribute( `.hqfw-js-photo-slider-shortcut[data-slide="${ currentSlide }"]`, 'data-state', 'active' );
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
	 * @param
	 */
	/**
	 * Move the slides based on the image_id.
	 *
	 * @since 1.0.0
	 *
	 * @param {integer} imageId     The target image id.
	 * @param {string}  imageSource The image url
	 */
	moveSlideByImageId( imageId, imageSource ) {
		if ( ! imageId || ! imageSource ) {
			return;
		}

		const sliderElem = hqfw.photoSlider.sliderElem;
		const slideElems = sliderElem.querySelectorAll( '.hqfw-photo-slider__slide' );
		if ( ! slideElems ) {
			return;
		}

		const imageIds = Array.from( slideElems ).map( function( slideElem ) {
			return parseInt( slideElem.getAttribute( 'data-image_id' ) );
		} );

		if ( ! imageIds ) {
			return;
		}

		const currentSlide = imageIds.indexOf( imageId );
		// Move slide based on the current slide.
		if ( currentSlide !== -1 ) {
			// If the target slide is primary then set primary
			// image source to the default image source.
			if ( imageIds[ 0 ] === imageId ) {
				hqfw.photoSlider.setPrimaryImage();
			}
		}

		// Move slide to the primary slide and change the
		// primary slide and collection image source.
		if ( currentSlide === -1 ) {
			hqfw.photoSlider.setPrimaryImage( imageSource );
		}

		sliderElem.setAttribute( 'data-current-slide', ( currentSlide === -1 ? 0 : currentSlide ) );
		hqfw.photoSlider.moveSlide();
	},

	/**
	 * Holds the previous and next navigation controller event.
	 *
	 * @since 1.0.0
	 */
	navigationController() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-photo-slider-controller', function( e ) {
			const target = e.target;
			const event = target.getAttribute( 'data-event' );
			if ( ! [ 'prev', 'next' ].includes( event ) ) {
				return;
			}

			const sliderElem = hqfw.photoSlider.sliderElem;
			const totalSlides = sliderElem.querySelectorAll( '.hqfw-photo-slider__slide' ).length;
			const currentSlide = parseInt( sliderElem.getAttribute( 'data-current-slide' ) );
			let updatedSlideValue = currentSlide;
			switch ( event ) {
				case 'prev':
					updatedSlideValue = currentSlide <= 0 ? totalSlides - 1 : currentSlide - 1;
					break;
				case 'next':
					updatedSlideValue = currentSlide >= totalSlides - 1 ? 0 : currentSlide + 1;
					break;
			}

			sliderElem.setAttribute( 'data-current-slide', updatedSlideValue );
			hqfw.photoSlider.moveSlide();
		} );
	},

	/**
	 * Holds the bullet navigation controller event.
	 *
	 * @since 1.0.0
	 */
	shortcutController() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-photo-slider-shortcut', function( e ) {
			const target = e.target;
			const state = target.getAttribute( 'data-state' );
			const slide = parseInt( target.getAttribute( 'data-slide' ) );
			if ( state !== 'default' || isNaN( slide ) ) {
				return;
			}

			const sliderElem = hqfw.photoSlider.sliderElem;
			sliderElem.setAttribute( 'data-current-slide', slide );
			hqfw.photoSlider.moveSlide();
		} );
	},

	/**
	 * Window screen resize event.
	 *
	 * @since 1.0.0
	 */
	screenResize() {
		window.addEventListener( 'resize', function() {
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
	 * @type {element}
	 */
	modalElem: null,

	/**
	 * Holds viewer body element.
	 *
	 * @since 1.0.0
	 *
	 * @type {element}
	 */
	bodyElem: null,

	/**
	 * Holds viewer container element.
	 *
	 * @since 1.0.0
	 *
	 * @type {element}
	 */
	containerElem: null,

	/**
	 * Holds viewer caption element.
	 *
	 * @since 1.0.0
	 *
	 * @type {element}
	 */
	captionElem: null,

	/**
	 * Holds viewer image element.
	 *
	 * @since 1.0.0
	 *
	 * @type {element}
	 */
	imageElem: null,

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		if ( ! this.constructor() ) {
			return;
		}

		this.openModal();
		this.closeModal();
		this.keyPressCloseModal();
		this.toggleFullScreen();
		this.keyPressExitFullScreen();
		this.screenResize();
	},

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	constructor() {
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
		// Set modalElem property.
		const modalElem = document.getElementById( 'hqfw-js-photobox-viewer' );
		if ( ! modalElem ) {
			return false;
		}

		hqfw.photoBox.modalElem = modalElem;

		// Set bodyElem property.
		const bodyElem = document.querySelector( '.hqfw-photobox-viewer__body' );
		if ( ! bodyElem ) {
			return false;
		}

		hqfw.photoBox.bodyElem = bodyElem;

		// Set containerElem property.
		const containerElem = document.querySelector( '.hqfw-photobox-viewer__container' );
		if ( ! containerElem ) {
			return false;
		}

		hqfw.photoBox.containerElem = containerElem;

		// Set captionElem property.
		const captionElem = document.getElementById( 'hqfw-js-photobox-viewer-caption' );
		if ( ! captionElem ) {
			return false;
		}

		hqfw.photoBox.captionElem = captionElem;

		// Set imageElem property.
		const imageElem = document.getElementById( 'hqfw-js-photobox-viewer-image' );
		if ( ! imageElem ) {
			return false;
		}

		hqfw.photoBox.imageElem = imageElem;

		// Return success.
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
		if ( hqfw.photoBox.getState() !== 'show' ) {
			return;
		}

		const bodyElem = hqfw.photoBox.bodyElem;
		const imageElem = hqfw.photoBox.imageElem;

		const bodyHeight = bodyElem.offsetHeight;
		let imageHeight = imageElem.naturalHeight;
		imageHeight = ( imageHeight > bodyHeight ? bodyHeight : imageHeight );
		imageElem.style.maxHeight = `${ imageHeight }px`;
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
		if ( isZoomEnabled === false ) {
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
		if ( modalState !== 'show' ) {
			return;
		}

		hqfw.fn.disableFullScreen();
		modalElem.setAttribute( 'data-state', 'hide' );
	},

	/**
	 * Opem the photo box viewer modal
	 *
	 * @since 1.0.0
	 */
	openModal() {
		hqfw.fn.eventListener( 'click', '#hqfw-js-photobox-trigger-btn', function() {
			const image = hqfw.photoSlider.getCurrentImage();
			if ( ! image ) {
				return;
			}

			const modalElem = hqfw.photoBox.modalElem;
			const captionElem = hqfw.photoBox.captionElem;

			const imageElems = modalElem.querySelectorAll( 'img' );
			if ( ! imageElems ) {
				return;
			}

			const fullScreenBtnElem = document.getElementById( 'hqfw-js-photobox-fullscreen-btn' );
			if ( fullScreenBtnElem ) {
				fullScreenBtnElem.setAttribute( 'data-event', 'show' );
				fullScreenBtnElem.setAttribute( 'aria-label', 'Fullscreen' );
				fullScreenBtnElem.setAttribute( 'title', 'Fullscreen' );
			}

			const imageName = hqfw.fn.getImageName( image.source );
			captionElem.textContent = ( ! image.title ? imageName : image.title );
			modalElem.setAttribute( 'data-state', 'show' );

			imageElems.forEach( function( imageElem, index ) {
				imageElem.setAttribute( 'src', image.source );
				imageElem.setAttribute( 'alt', image.title );
				imageElem.setAttribute( 'title', image.title );

				if ( index === 0 ) {
					imageElem.addEventListener( 'load', function() {
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
		hqfw.fn.eventListener( 'click', '#hqfw-js-photobox-close-btn', function() {
			hqfw.photoBox.hideModal();
		} );
	},

	/**
	 * Close photo box viewer by key press (ESC) event.
	 *
	 * @since 1.0.0
	 */
	keyPressCloseModal() {
		document.addEventListener( 'keydown', function( e ) {
			if ( e.key === 'Escape' ) {
				setTimeout( function() {
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
		hqfw.fn.eventListener( 'click', '#hqfw-js-photobox-fullscreen-btn', function( e ) {
			const target = e.target;
			const event = target.getAttribute( 'data-event' );
			if ( ! [ 'show', 'exit' ].includes( event ) ) {
				return;
			}

			if ( event === 'show' ) {
				hqfw.fn.enableFullScreen();
			}

			if ( event === 'exit' ) {
				hqfw.fn.disableFullScreen();
			}

			const latestEvent = ( event === 'show' ? 'exit' : 'show' );
			const latestLabel = ( event === 'show' ? 'Fullscreen Exit' : 'Fullscreen' );
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
		vendorPrefix.forEach( function( prefix ) {
			document.addEventListener( `${ prefix }fullscreenchange`, function() {
				if ( ! document.fullscreenElement && ! document.webkitIsFullScreen && ! document.mozFullScreen && ! document.msFullscreenElement ) {
					const fullScreenBtnElem = document.getElementById( 'hqfw-js-photobox-fullscreen-btn' );
					if ( ! fullScreenBtnElem ) {
						return;
					}

					fullScreenBtnElem.setAttribute( 'data-event', 'show' );
					fullScreenBtnElem.setAttribute( 'aria-label', 'Fullscreen' );
					fullScreenBtnElem.setAttribute( 'title', 'Fullscreen' );
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
		window.addEventListener( 'resize', function() {
			// Set image size.
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
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		if ( ! this.constructor() ) {
			return;
		}

		this.variationForm();
		this.variationIdInputListener();
		this.variatioWrapListener();
	},

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	constructor() {
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
		if ( ! variationIdFormElem ) {
			return;
		}

		jQuery( variationFormElem ).on( 'woocommerce_variation_select_change', function() {
			setTimeout( function() {
				const variationId = variationIdFormElem.value;
				if ( ! variationId ) {
					// Move the photo slider to primary image.
					hqfw.photoSlider.moveSlideToPrimary();

					// Update the product summary height.
					hqfw.quickView.setProductSummaryBodyHeight();
				}
			}, 200 );
		} );
	},

	/**
	 * Watch the variation form if there's a new selected variation.
	 *
	 * @since 1.0.0
	 */
	variatioWrapListener() {
		const variationFormElem = hqfw.variation.variationFormElem;
		const variationWrapElem = variationFormElem.querySelector( '.single_variation_wrap' );
		if ( ! variationWrapElem ) {
			return;
		}

		jQuery( variationWrapElem ).on( 'show_variation', function( event, variation ) {
			// Move photo slider based on the image id and source.
			hqfw.photoSlider.moveSlideByImageId( variation.image_id, variation.image.full_src );

			// Update the product summary height.
			hqfw.quickView.setProductSummaryBodyHeight();
		} );
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
	 * @type {element}
	 */
	modalElem: null,

	/**
	 * Holds the content viewer element.
	 *
	 * @since 1.0.0
	 *
	 * @type {element}
	 */
	viewerElem: null,

	/**
	 * Holds the product viewer element.
	 *
	 * @since 1.0.0
	 *
	 * @type {element}
	 */
	viewerProductElem: null,

	/**
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		if ( ! this.constructor() ) {
			return;
		}

		this.openModal();
		this.closeModal();
		this.autoCloseModal();
		this.keyPressCloseModal();
		this.slideNavigation();
		this.screenResize();
		this.setSlideNavigationVisibility();
		this.setProductGalleryTriggerIcon();
	},

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	constructor() {
		// Set all elements property.
		if ( ! this.setElementProperties() ) {
			return false;
		}

		// Set productIds property.
		this.setProductIds();

		// Return success.
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
		// Set modalElem property.
		const modalElem = document.getElementById( 'hqfw-js-modal' );
		if ( ! modalElem ) {
			return false;
		}

		hqfw.quickView.modalElem = modalElem;

		// Set viewerElem property.
		const viewerElem = document.getElementById( 'hqfw-js-viewer-content' );
		if ( ! viewerElem ) {
			return false;
		}

		hqfw.quickView.viewerElem = viewerElem;

		// Set viewerProductElem property.
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
		if ( ! quickViewBtnElems ) {
			return;
		}

		quickViewBtnElems.forEach( function( quickViewBtnElem ) {
			const productId = parseInt( quickViewBtnElem.getAttribute( 'data-product_id' ) );
			if ( ! isNaN( productId ) && productId > 0 ) {
				const productIds = hqfw.quickView.productIds;
				if ( ! productIds.includes( productId ) ) {
					hqfw.quickView.productIds.push( productId );
				}
			}
		} );
	},

	/**
	 * Set the height of product summary section.
	 *
	 * @since 1.0.0
	 */
	setProductSummaryBodyHeight() {
		if ( window.innerWidth <= 992 ) {
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

		setTimeout( function() {
			const galleryHeight = galleryElem.clientHeight;
			summaryBodyElem.style.maxHeight = `${ ( galleryHeight - headHeight ) }px`;
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
		if ( modalState !== 'show' ) {
			return;
		}

		const productViewerElem = modalElem.querySelector( '.hqfw-product' );
		if ( ! productViewerElem ) {
			return;
		}

		const width = window.innerWidth;
		const height = window.innerHeight;
		if ( width <= 992 && height <= 850 ) {
			productViewerElem.style.height = `${ ( height - 40 ) }px`;
		} else {
			productViewerElem.style.height = 'auto';
		}
	},

	/**
	 * Set or override the maginify icon in woocommerce-product-gallery__trigger.
	 *
	 * @since 1.0.0
	 */
	setProductGalleryTriggerIcon() {
		setTimeout( function() {
			const galleryTriggerElems = document.querySelectorAll( 'a.woocommerce-product-gallery__trigger' );
			if ( ! galleryTriggerElems ) {
				return;
			}

			Array.from( galleryTriggerElems ).forEach( function( galleryTriggerElem ) {
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
	 * @param {integer} productId The current product id viewed.
	 * @return {Object}
	 */
	getProductIdAdjacent( productId ) {
		const ids = hqfw.quickView.productIds;
		const idsCount = ids.length;
		const data = {
			prevId: 0,
			nextId: 0,
		};

		if ( ! productId || idsCount <= 1 ) {
			return data;
		}

		const idIndex = ids.indexOf( productId );
		if ( idIndex === -1 ) {
			return data;
		}

		data.prevId = ( idIndex > 0 ? ids[ idIndex - 1 ] : ids[ idsCount - 1 ] );
		data.nextId = ( idIndex < ( idsCount - 1 ) ? ids[ idIndex + 1 ] : ids[ 0 ] );
		return data;
	},

	/**
	 * Set the viewer slide controller navigation attributes
	 * state and product id.
	 *
	 * @since 1.0.0
	 *
	 * @param {integer} productId The current product id viewed.
	 */
	setSlideNavigationProperties( productId ) {
		if ( ! productId ) {
			return;
		}

		const data = hqfw.quickView.getProductIdAdjacent( productId );

		const prevSelector = '.hqfw-js-navigation-btn[data-event="prev"]';
		hqfw.fn.setAttribute( prevSelector, 'data-state', ( data.prevId > 0 ? 'default' : 'hidden' ) );
		hqfw.fn.setAttribute( prevSelector, 'data-product_id', data.prevId );

		const nextSelector = '.hqfw-js-navigation-btn[data-event="next"]';
		hqfw.fn.setAttribute( nextSelector, 'data-state', ( data.nextId > 0 ? 'default' : 'hidden' ) );
		hqfw.fn.setAttribute( nextSelector, 'data-product_id', data.nextId );
	},

	/**
	 * Set the viewer slide controller navigation visibility
	 * based on the number of productIds property.
	 *
	 * @since 1.0.0
	 */
	setSlideNavigationVisibility() {
		const totalIds = hqfw.quickView.productIds.length;
		const state = ( totalIds > 1 ? 'default' : 'hidden' );
		hqfw.fn.setAttribute( '.hqfw-js-navigation-btn', 'data-state', state );
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
		if ( modalState !== 'show' ) {
			return;
		}

		viewerElem.setAttribute( 'data-state', 'hidden' );
		const isAnimationDone = await hqfw.fn.isAnimationDone( viewerElem );
		if ( isAnimationDone ) {
			modalElem.setAttribute( 'data-state', 'hide' );
		}
	},

	/**
	 * Directly opened using the quick view button.
	 *
	 * @since 1.0.0
	 */
	openModal() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-quick-view-btn', async function( e ) {
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
			const res = await hqfw.fn.fetch( {
				nonce: hqfwLocal.nonce.getProductContent,
				action: 'hqfw_get_product_content',
				productId,
			} );

			if ( res.success === true ) {
				if ( res.data.response === 'SUCCESSFULLY_RETRIEVED' ) {
					// Inject product content.
					viewerProductElem.innerHTML = res.data.content;
					viewerElem.setAttribute( 'data-state', 'prepare' );

					hqfw.photoSlider.init();

					// Initialize variation form.
					hqfw.variation.init();

					// Update the product summary height.
					hqfw.quickView.setProductSummaryBodyHeight();

					// Show product viewer.
					setTimeout( function() {
						viewerElem.setAttribute( 'data-state', 'default' );
					}, 500 );

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
	 * Close quick view modal via click event.
	 *
	 * @since 1.0.0
	 */
	closeModal() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-close-modal', async function() {
			hqfw.quickView.hideModal();
		} );
	},

	/**
	 * Close quick view modal after adding to cart event.
	 *
	 * @since 1.0.0
	 */
	autoCloseModal() {
		jQuery( 'body' ).on( 'added_to_cart', function() {
			hqfw.quickView.hideModal();
		} );
	},

	/**
	 * Close quick view modal by key press (ESC) event.
	 *
	 * @since 1.0.0
	 */
	keyPressCloseModal() {
		document.addEventListener( 'keydown', function( e ) {
			if ( e.key === 'Escape' ) {
				// Close first if photobox state is hide.
				if ( hqfw.photoBox.getState() === 'hide' ) {
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
		hqfw.fn.eventListener( 'click', '.hqfw-js-navigation-btn', async function( e ) {
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
			hqfw.fn.setAttribute( '.hqfw-js-navigation-btn', 'data-state', 'disabled' );

			// Get the product content.
			const res = await hqfw.fn.fetch( {
				nonce: hqfwLocal.nonce.getProductContent,
				action: 'hqfw_get_product_content',
				productId,
			} );

			if ( res.success === true ) {
				if ( res.data.response === 'SUCCESSFULLY_RETRIEVED' ) {
					// Inject product content.
					viewerProductElem.innerHTML = res.data.content;
					viewerElem.setAttribute( 'data-state', 'prepare' );

					// Initialize photo slider.
					hqfw.photoSlider.init();

					// Initialize variation form.
					hqfw.variation.init();

					// Update the product summary height.
					hqfw.quickView.setProductSummaryBodyHeight();

					// Display product viewer.
					setTimeout( function() {
						viewerElem.setAttribute( 'data-state', 'display' );
					}, 500 );

					// Enable navigation button.
					hqfw.fn.setAttribute( '.hqfw-js-navigation-btn', 'data-state', 'default' );

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
		window.addEventListener( 'resize', function() {
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
	 * @param {Function} func callback
	 * @return {Function} The callback function.
	 */
	execute( func ) {
		if ( typeof func !== 'function' ) {
			return;
		}
		if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
			return func();
		}

		document.addEventListener( 'DOMContentLoaded', func, false );
	},
};

hqfw.domReady.execute( function() {
	hqfw.photoBox.init();
	hqfw.quickView.init();
} );
