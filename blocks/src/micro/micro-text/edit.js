
import { THEME_NAME, ICONS } from '../../helpers';
import { __ } from '@wordpress/i18n';
import {
  InspectorControls,
  RichText,
  withColors,
  PanelColorSettings,
  withFontSizes,
  useBlockProps,
} from '@wordpress/block-editor';
import {
  PanelBody,
  SelectControl,
  BaseControl,
  Button,
} from '@wordpress/components';
import { Fragment } from '@wordpress/element';
import { compose } from '@wordpress/compose';
import classnames from 'classnames';
import { times } from 'lodash';

const MICRO_COPY_CLASS = 'micro-copy';

export function MicroTextEdit( props ) {
  const {
    attributes,
    setAttributes,
    className,
    textColor,
    setTextColor,
  } = props;

  const {
    content,
    type,
    icon,
  } = attributes;

  const classes = classnames(className, {
    [ 'micro-text' ]: true,
    [ MICRO_COPY_CLASS ]: true,
    [ type ]: !! type,
    'has-text-color': textColor.color,
    [textColor.class]: textColor.class,
  });
  const blockProps = useBlockProps({
    className: classes,
  });

  return (
    <Fragment>
      <InspectorControls>
        <PanelBody title={ __( 'スタイル設定', THEME_NAME ) }>

          <SelectControl
            label={ __( 'タイプ', THEME_NAME ) }
            value={ type }
            onChange={ ( value ) => setAttributes( { type: value } ) }
            options={ [
              {
                value: 'micro-top',
                label: __( '下寄り', THEME_NAME ),
              },
              {
                value: 'micro-bottom',
                label: __( '上寄り', THEME_NAME ),
              },
            ] }
          />

          <BaseControl label={ __( 'アイコン', THEME_NAME ) }>
            <div className="icon-setting-buttons">
              { times( ICONS.length, ( index ) => {
                return (
                  <Button
                    isDefault
                    isPrimary={ icon === ICONS[index].value }
                    className={ICONS[index].label}
                    onClick={ () => {
                      setAttributes( { icon: ICONS[index].value } );
                    } }
                    key={ index }
                  >
                  </Button>
                );
              } ) }
            </div>
          </BaseControl>

        </PanelBody>

        <PanelColorSettings
          title={ __( '色設定', THEME_NAME ) }
          colorSettings={[
            {
              label: __( '文字色', THEME_NAME ),
              onChange: setTextColor,
              value: textColor.color,
            },
          ]}
        />
      </InspectorControls>

      <div { ...blockProps }>
        <span className="micro-text-content micro-content">
          { icon && <span className={classnames('micro-text-icon', 'micro-icon', icon)}></span> }
          <RichText
            value={ content }
            onChange={ ( value ) => setAttributes( { content: value } ) }
          />
        </span>
      </div>

    </Fragment>
  );
}

export default compose([
  withColors('backgroundColor', {textColor: 'color', borderColor: 'border-color'}),
  withFontSizes('fontSize'),
])(MicroTextEdit);