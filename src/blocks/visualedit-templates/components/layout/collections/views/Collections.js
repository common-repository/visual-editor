/**
 * Collections
 * This is a render component that deals with rendering output, but not state management.
 */

/**
 * Dependencies.
 */
import LayoutLibraryItemCard from "./../../layout-library-item-card";
import { importBlockPattern } from "./../data/importBlockPattern.js";
import { useCollectionsVisualState } from "./../data/useCollectionsVisualState.js";
import { CollectionCard } from "./CollectionCard.js";

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { ButtonGroup } = wp.components;

export function Collections(props) {
  const collectionsView = useCollectionsVisualState({
    view: "collections",
    collection: null,
  });

  function renderCollections(collections) {
    if (collectionsView.currentView !== "collections") {
      return "";
    }

    const mapper = [];

    for (var collection in collections) {
      mapper.push(
        <CollectionCard
          key={collection}
          collectionSlug={collection}
          collectionsView={collectionsView}
          {...props}
        />
      );
    }

    return (
      <ButtonGroup
        className="visualedit-patterns-choices"
        aria-label={__(
          "Collections Available",
          "visual-editor-blocks"
        )}
      >
        {mapper}
      </ButtonGroup>
    );
  }

  function renderSingleCollectionItems(itemType = "layouts") {
    const mapper = [];

    for (var layoutKey in props.context[itemType]) {
      const item = props.context[itemType][layoutKey];
      if (
        item.hasOwnProperty("collection") &&
        collectionsView.currentCollection === item.collection.slug
      ) {
        mapper.push(
          <LayoutLibraryItemCard
            key={item.key}
            itemKey={item.key}
            name={item.name}
            image={item.image}
            import={importBlockPattern}
            content={item.content}
            context={props.context}
            clientId={props.clientId}
          />
        );
      }
    }

    if (mapper.length === 0) {
      return "";
    }

    return (
      <>
        <h3 className="visualedit-collection-type-title">
          {(() => {
            if (itemType === "layouts") {
              return __("Page Layouts", "visual-editor-blocks");
            }

            if (itemType === "sections") {
              return __("Page Sections", "visual-editor-blocks");
            }
          })()}
        </h3>
        <ButtonGroup
          className="visualedit-patterns-choices"
          aria-label={__(
            "Layout Options in this Collection",
            "visual-editor-blocks"
          )}
        >
          {mapper}
        </ButtonGroup>
      </>
    );
  }

  function renderViewAllButton() {
    if (collectionsView.currentView !== "collection") {
      return "";
    }

    return (
      <div className="visualedit-collections-view-all-container">
        <button
          className="visualedit-collections-view-all-link"
          onClick={() => {
            collectionsView.setCurrentView("collections");
          }}
        >
          <span className="dashicons dashicons-arrow-left-alt"></span>
          {__("View All Collections ", "visual-editor-blocks")}
        </button>
      </div>
    );
  }

  function renderMainTitle() {
    if (collectionsView.currentView === "collections") {
      return (
        <h2 className="visualedit-collection-title">
          {__("Collections ", "visual-editor-blocks")}
        </h2>
      );
    }

    if (collectionsView.currentView === "collection") {
      return (
        <h2 className="visualedit-collection-title">
          {__("Showing ", "visual-editor-blocks") +
            props.context.collections[collectionsView.currentCollection].label}
        </h2>
      );
    }
  }

  function renderSingleCollectionView() {
    if (collectionsView.currentView !== "collection") {
      return "";
    }

    return (
      <>
        {renderSingleCollectionItems("sections")}
        {renderSingleCollectionItems("layouts")}
      </>
    );
  }

  return (
    <div className="visualedit-collections">
      <div className="visualedit-collections-header">
        <div className="visualedit-collections-header-left">
          {renderViewAllButton()}
          {renderMainTitle()}
        </div>
      </div>
      <div className="visualedit-collections-body">
        {renderCollections(props.context.collections)}
        {renderSingleCollectionView()}
      </div>
    </div>
  );
}
