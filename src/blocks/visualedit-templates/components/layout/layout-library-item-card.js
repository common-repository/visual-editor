/**
 * Pattern Card.
 */

/**
 * Dependencies.
 */
import classnames from "classnames";

const { apiFetch } = wp;

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { Button, Dashicon, Tooltip } = wp.components;

export default class LayoutLibraryItemCard extends Component {
  constructor() {
    super(...arguments);
    this.state = {
      importing: false
    }
  }

  addDefaultSrc(event) {
    event.target.src = visual_editor_globals?.pattern_fallback_image;
  }

  importApiCall( content ) {
    //call backend api, which in turn calls function to download images and replace links with downloaded paths.
    return apiFetch( {
			path: '/visualeditblocks/v1/import',
			method: 'PATCH',
			body: JSON.stringify( { pattern_content: content } ),
			_wpnonce: wpApiSettings.nonce,
		} )
			.then( ( modified_content ) => {
        this.setState({importing: false})
				return modified_content;
			} )
			.catch( ( error ) => console.error( error ) );
  }

  async importCurrentPattern(content, id) {
    this.setState({importing: true})
    //api call to backend function: download images in content and replace remote path with downloaded path.
    let modified_content = await this.importApiCall( content );
    //call internal import function with content provided, to render pattern on screen.
    this.props.import(modified_content['data'], id);
  }

  render() {
    return (
      <Fragment>
        <div
          key={"visualedit-patterns-design-" + this.props.itemKey}
          className="visualedit-patterns-design"
        >
          <div className="visualedit-patterns-design-inside">
            <div className="-design-item">
              <div
                key={this.props.itemKey}
                className="visualedit-patterns-insert-button visual-editor-blocks-import-button-outer"
                isSmall
              >
                <div className={'visualedit-pattern-preview'}></div>
                <div
                  className={`visualedit-pattern-importer-image-${this.props.type}`}
                  style = {{backgroundImage: `url(${this.props.image
                    ? this.props.image
                    : visual_editor_globals?.pattern_fallback_image})`}}
                  alt={this.props.name}
                  onError={this.addDefaultSrc}
                />
                <button
                  className="visual-editor-blocks-import-button-inner"
                  onClick={() => {
                    //call function having api call.
                    this.importCurrentPattern(this.props.content, this.props.clientId)
                  }}
                >
                    <span class="dashicons dashicons-download visual-editor-blocks-import-icon"></span>                  
                    {
                       this.state.importing? 'Importing...Please Wait' : 'Import'
                    }
                </button>
              </div>

              <div className="visualedit-patterns-design-info">
                <div className="visualedit-patterns-design-title">
                  {this.props.name}
                  {
                    <Tooltip
                      text={
                        this.props.context.favoriteKeys.includes(
                          this.props.itemKey
                        )
                          ? __(
                              "Remove from Favorites",
                              "visual-editor-blocks"
                            )
                          : __(
                              "Add to Favorites",
                              "visual-editor-blocks"
                            )
                      }
                    >
                      <Button
                        key={"buttonFavorite"}
                        className="visualedit-patterns-favorite-button"
                        isSmall
                        onClick={() => {
                          this.props.context.toggleFavorite(this.props.itemKey);
                        }}
                      >
                        <Dashicon
                          icon={"heart"}
                          className={classnames(
                            "visualedit-patterns-icon-favorite",
                            this.props.context.favoriteKeys.includes(
                              this.props.itemKey
                            ) && "visualedit-patterns-icon-favorite-active"
                          )}
                        />
                      </Button>
                    </Tooltip>
                  }
                </div>
              </div>
            </div>
          </div>
        </div>
      </Fragment>
    );
  }
}
