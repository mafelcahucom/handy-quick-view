/**
 * Return the image name from an image source path.
 *
 * @since 1.0.0
 *
 * @param  {string} imagePath Contains the full path of the image.
 * @return {string} The name of the image.
 */
const getImageName = function( imagePath ) {
    if ( ! imagePath ) {
        return;
    }

    return imagePath.split( '/' ).pop();
};

export default getImageName;