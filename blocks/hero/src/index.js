import Edit from './edit';
import './editor.css';
import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import metadata from '../block.json';

registerBlockType(metadata.name, {
    ...metadata,
    edit: Edit,
});
