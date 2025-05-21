import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const { title, subtitle, backgroundImage } = attributes;
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps } style={{
			backgroundImage: backgroundImage ? `url(${backgroundImage})` : undefined,
			backgroundSize: 'cover',
			backgroundPosition: 'center',
			padding: '4rem 2rem',
			color: 'var(--wp--preset--color--primary, #222)'
		}}>
			<MediaUploadCheck>
				<MediaUpload
					onSelect={ media => setAttributes({ backgroundImage: media.url }) }
					allowedTypes={ ['image'] }
					value={ backgroundImage }
					render={ ({ open }) => (
						<Button onClick={ open } variant="primary" style={{ marginBottom: '1rem' }}>
							{ backgroundImage ? __('Change Background', 'lightweight-theme') : __('Select Background', 'lightweight-theme') }
						</Button>
					)}
				/>
			</MediaUploadCheck>
			<RichText
				tagName="h1"
				value={ title }
				onChange={ title => setAttributes({ title }) }
				placeholder={ __('Hero title…', 'lightweight-theme') }
				style={{ fontSize: '2.5rem', fontWeight: 'bold', marginBottom: '1rem' }}
			/>
			<RichText
				tagName="p"
				value={ subtitle }
				onChange={ subtitle => setAttributes({ subtitle }) }
				placeholder={ __('Hero subtitle…', 'lightweight-theme') }
				style={{ fontSize: '1.25rem', marginBottom: 0 }}
			/>
		</div>
	);
}
