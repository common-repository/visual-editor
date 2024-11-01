/**
 * Collections Card.
 * This is a render component that deals with rendering output, but not logic or state management.
 */

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Button } = wp.components;

export function CollectionCard(props) {
  return (
    <>
      <div className="visualedit-patterns-design">
        <div className="visualedit-patterns-design-inside">
          <div className="visualedit-patterns-design-item">
            <Button
              className="visualedit-patterns-insert-button visualedit-patterns-collection-button"
              isSmall
              onClick={() => {
                props.collectionsView.setCurrentView("collection");
                props.collectionsView.setCurrentCollection(
                  props.collectionSlug
                );
              }}
            >
              <div className="visualedit-patterns-collection-cover">
                <img
                  src={
                    props.context.collections[props.collectionSlug].thumbnail
                      ? props.context.collections[props.collectionSlug]
                          .thumbnail
                      : visual_editor_globals?.pattern_fallback_image
                  }
                  alt={props.context.collections[props.collectionSlug].label}
                  onError={(event) => {
                    event.target.src =
                      visual_editor_globals?.pattern_fallback_image;
                  }}
                />
              </div>
              <div className="visualedit-patterns-design-info">
                <div className="visualedit-patterns-design-title">
                  <span className="visualedit-patterns-collection-label">
                    {props.context.collections[props.collectionSlug].label}
                  </span>
                </div>
              </div>
            </Button>
          </div>
        </div>
      </div>
    </>
  );
}
