/**
 * Patterns Screen.
 *
 * Search and Categories
 */

/**
 * Dependencies.
 */
import map from "lodash/map";
import classnames from "classnames";
import LayoutLibraryItem from "./layout-library-item";
import { LayoutsContext } from "../layouts-provider";
import { Collections } from "./collections/views/Collections.js";

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { addQueryArgs } = wp.url;
const { Component, Fragment } = wp.element;
const { ButtonGroup, TextControl, SelectControl } = wp.components;

export default class LayoutLibrary extends Component {
  constructor() {
    super(...arguments);

    this.state = {
      category: "all",
      search: undefined,
      activeView: "grid",
    };
  }

  getLayoutArray() {
    let component = [];

    switch (this.props.currentTab) {
      case "visualedit-patterns-tab-layouts":
        component = this.props.context.layouts;
        break;
      case "visualedit-patterns-tab-sections":
        component = this.props.context.sections;
        break;
      case "visualedit-patterns-tab-favorites":
        component = this.props.context.favorites;
        break;
      case "visualedit-patterns-tab-reusable-blocks":
        component = this.props.context.reusableBlocks;
        break;
      case "visualedit-patterns-tab-collections":
        component = this.props.context.collections;
        break;
    }

    return component;
  }

  render() {
    const blockLayout = this.getLayoutArray();

    const cats = ["all"];

    if (this.props.currentTab !== "visualedit-patterns-tab-collections") {
      for (let i = 0; i < blockLayout.length; i++) {
        for (let c = 0; c < blockLayout[i].category.length; c++) {
          if (!cats.includes(blockLayout[i].category[c])) {
            cats.push(blockLayout[i].category[c]);
          }
        }
      }
    }

    const catOptions = cats.map((item) => {
      return {
        value: item,
        label: item.charAt(0).toUpperCase() + item.slice(1),
      };
    });

    const data = this.props.data;

    if (this.props.currentTab === "visualedit-patterns-tab-collections") {
      return <Collections key={this.props.data.key} {...this.props} />;
    }

    return (
      <Fragment key={"patterns-collection-" + this.props.clientId}>
        {"visualedit-patterns-tab-reusable-blocks" !== this.props.currentTab ? (
          <Fragment>
            <div className="visualedit-pattern-importer-modal-header">
              <SelectControl
                key={"pattern-categories-" + this.props.clientId}
                value={this.state.category}
                options={catOptions}
                onChange={(value) => this.setState({ category: value })}
              />
              <TextControl
                key={"patterns-search-" + this.props.clientId}
                type="text"
                value={this.state.search}
                placeholder={__(
                  "Search Patterns",
                  "visual-editor-blocks"
                )}
                onChange={(value) => this.setState({ search: value })}
              />
            </div>
          </Fragment>
        ) : (
          <Fragment>
            <div className="visualedit-pattern-importer-modal-header visualedit-pattern-importer-modal-header-reusable">
              <div>
                {__("Reusable Blocks", "visual-editor-blocks")}
              </div>
              <div className="visualedit-pattern-importer-modal-header-reusable-actions">
                <a
                  className="editor-inserter__manage-reusable-blocks block-editor-inserter__manage-reusable-blocks"
                  href={addQueryArgs("edit.php", {
                    post_type: "wp_block",
                  })}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  {__(
                    "Manage All Reusable Blocks",
                    "visual-editor-blocks"
                  )}
                </a>
              </div>
            </div>
          </Fragment>
        )}

        <LayoutsContext.Consumer>
          {(context) => (
            <ButtonGroup
              key={"patterns-button-group-" + this.props.clientId}
              className={classnames(
                "visualedit-patterns-choices",
                "current-tab-" + this.props.currentTab,
                "full" === this.state.activeView
                  ? "visualedit-patterns-view-full"
                  : null
              )}
              aria-label={__(
                "Layout Options",
                "visual-editor-blocks"
              )}
            >
              {map(
                data,
                ({ type, name, key, image, content, category, keywords }) => {
                  if (
                    ("all" === this.state.category ||
                      category.includes(this.state.category)) &&
                    (!this.state.search ||
                      (keywords &&
                        keywords.some((x) =>
                          x
                            .toLowerCase()
                            .includes(this.state.search.toLowerCase())
                        )))
                  ) {
                    return (
                      <LayoutLibraryItem
                        key={"pattern-item-" + key}
                        name={name}
                        itemKey={key}
                        type= {type}
                        image={image}
                        content={content}
                        context={context}
                        clientId={this.props.clientId}
                        currentTab={this.props.currentTab}
                      />
                    );
                  }
                }
              )}
            </ButtonGroup>
          )}
        </LayoutsContext.Consumer>
      </Fragment>
    );
  }
}
