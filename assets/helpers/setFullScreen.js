
/**
 * Set the document full screen state.
 * 
 * @since 1.0.0
 */
const setFullScreen = {

    /**
     * Set document fullscreen to enable.
     * 
     * @since 1.0.0
     */
    enable() {
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
     * Set document fullscreen to disable.
     */
    disable() {
        if ( document.fullscreenElement ) {
			if ( document.exitFullscreen ) {
				document.exitFullscreen();
			} else if ( document.mozCancelFullScreen ) {
				document.mozCancelFullScreen();
			} else if ( document.webkitExitFullscreen ) {
				document.webkitExitFullscreen();
			}
		}
    }

};

export default setFullScreen;