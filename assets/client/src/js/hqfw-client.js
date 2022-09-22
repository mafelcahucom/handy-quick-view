/**
 * Namespace.
 *
 * @since 1.0.0
 *
 * @type {Object}
 * @author Mafel John Cahucom
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
	 * Check if the element animation is done or into end.
	 *
	 * @since 1.0.0
	 * 
	 * @param  {element}  element  The element to be watch.
	 * @return {Boolean}
	 */
	isAnimationDone( element ) {
		return new Promise( function( resolve, reject ) {
			if ( ! element ) {
				resolve( false );
			}

			element.addEventListener( 'animationend', function( e ) {
				resolve( true );
			});
		});
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
	 * @param  {string}  selector  The element query selector.
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
		});
	}
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
			}
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
				allowed: hqfwLocal.toaster.isUseToaster
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
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		this.navigationController();
		this.shortcutController();
	},

	/**
	 * Zoom in the image on grab event.
	 *
	 * @since 1.0.0
	 */
	imageZoom() {
		jQuery( '.hqfw-image-zoom' ).zoom();
	},

	/**
	 * Move the slides.
	 *
	 * @since 1.0.0
	 * 
	 * @param  {object}  sliderElem  The slider element.
	 */
	move( sliderElem ) {
		if ( ! sliderElem ) {
			return;
		}

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
	 * Holds the previous and next navigation controller event.
	 *
	 * @since 1.0.0
	 */
	navigationController() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-photo-slider-controller', function( e ) {
			const target = e.target;
			const event = target.getAttribute( 'data-event' );
			const slider = target.getAttribute( 'data-slider' );
			if ( ! [ 'prev', 'next' ].includes( event ) || ! slider ) {
				return;
			}

			const sliderElem = document.getElementById( slider );
			if ( ! sliderElem ) {
				return;
			}


			let totalSlides = sliderElem.querySelectorAll( '.hqfw-photo-slider__container .hqfw-photo-slider__slide' ).length;
			let currentSlide = parseInt( sliderElem.getAttribute( 'data-current-slide' ) );
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
			hqfw.photoSlider.move( sliderElem );
		});
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
			const slider = target.getAttribute( 'data-slider' );
			const slide = parseInt( target.getAttribute( 'data-slide' ) );
			if ( state !== 'default' || ! slider || isNaN( slide ) ) {
				return;
			}	

			const sliderElem = document.getElementById( slider );
			if ( ! sliderElem ) {
				return;
			}
			
			sliderElem.setAttribute( 'data-current-slide', slide );
			hqfw.photoSlider.move( sliderElem );
		});
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
	 * Initialize.
	 *
	 * @since 1.0.0
	 */
	init() {
		this.setProductIds();
		this.show();
		this.navigation();
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
		});
	},

	/**
	 * Return the previous and next product id based on
	 * the current id viewed.
	 *
	 * @since 1.0.0
	 * 
	 * @param  {integer}  productId  The current product id viewed.
	 * @return {object}
	 */
	getProductIdAdjacent( productId ) {
		const ids = hqfw.quickView.productIds;
		const idsCount = ids.length;
		const data = {
			prevId: 0,
			nextId: 0
		};

		if ( ! productId || idsCount <= 1 ) {
			return data;
		}

		const idIndex = ids.indexOf( productId );
		if ( idIndex === -1  ) {
			return data;
		}

		data.prevId = ( idIndex > 0 ? ids[ idIndex - 1 ] : ids[ idsCount - 1 ] );
		data.nextId = ( idIndex < ( idsCount - 1 ) ? ids[ idIndex + 1 ] : ids[0] );
		return data;
	},

	/**
	 * Set the modal state.
	 *
	 * @since 1.0.0
	 * 
	 * @param  {string}  state  The state of the modal |show|hide.
	 */
	setModalState( state ) {
		const modalElem = document.getElementById( 'hqfw-js-modal' );
		const viewerContentElem = document.getElementById( 'hqfw-js-viewer-content' );
		if ( ! modalElem || ! viewerContentElem || ! [ 'show', 'hide' ].includes( state ) ) {
			return;
		}

		viewerContentElem.setAttribute( 'data-state', 'loading' );

		switch ( state ) {
			case 'show':
				modalElem.setAttribute( 'data-state',  'show' );
				break;
			case 'hide':
				modalElem.setAttribute( 'data-state',  'hide' );
				break;
		}
	},

	/**
	 * Set the viewer controller navigation attributes
	 * state and product id.
	 *
	 * @since 1.0.0
	 * 
	 * @param {integer}  productId  The current product id viewed.
	 */
	setNavigationProperties( productId ) {
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
	 * Directly opened using the quick view button.
	 *
	 * @since 1.0.0
	 */
	show() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-quick-view-btn', async function( e ) {
			const target = e.target;
			const productId = parseInt( target.getAttribute( 'data-product_id' ) );
			if ( ! productId || isNaN( productId ) ) {
				return;
			}

			// Set navigation properties.
			hqfw.quickView.setNavigationProperties( productId );

			// Set modal state to show.
			hqfw.quickView.setModalState( 'show' );

			const res = await hqfw.fn.fetch({
				nonce: hqfwLocal.nonce.getProductContent,
				action: 'hqfw_get_product_content',
				productId: productId
			});

			if ( res.success === true ) {
				if ( res.data.response === 'SUCCESSFULLY_RETRIEVED' ) {
					const viewerElem = document.getElementById( 'hqfw-js-viewer-content' );
					const viewerProductElem = document.getElementById( 'hqfw-js-viewer-product' );

					viewerProductElem.innerHTML = res.data.content;
					viewerElem.setAttribute( 'data-state', 'default' );

					// Refresh image zoom.
					hqfw.photoSlider.imageZoom();
				}
			} else {
				hqfw.prompt.errorMessage( res.data.error );
			}
		});
	},

	/**
	 * Update the product content based on previous and next product.
	 *
	 * @since 1.0.0
	 */
	navigation() {
		hqfw.fn.eventListener( 'click', '.hqfw-js-navigation-btn', function( e ) {
			const target = e.target;
			const event = target.getAttribute( 'data-event' );
			const productId = parseInt( target.getAttribute( 'data-product_id' ) );
			if ( ! [ 'prev', 'next' ].includes( event ) || ! productId || isNaN( productId ) ) {
				return;
			}

			// Set navigation properties.
			hqfw.quickView.setNavigationProperties( productId );
		});
	}
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
	hqfw.photoSlider.init();
	hqfw.quickView.init();

	/**const form = document.querySelector( '.variations_form' );
	const variations = form.getAttribute( 'data-product_variations' );
	console.log( JSON.parse( variations ) );**/
} );
