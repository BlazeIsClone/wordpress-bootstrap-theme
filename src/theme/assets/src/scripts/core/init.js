export const init = (() => {
	if (!window.console) return;

	const message = '%c 👋 Custom Bootstrap Theme Initialized!';
	const fallbackMessage = 'Custom Bootstrap Theme';
	const ua = navigator.userAgent.toLowerCase();

	let styles = [
		'font-size: 12px',
		'font-family: monospace',
		'display: inline-block',
		'padding: 8px 19px',
		'border: 1px dashed;',
	].join(';');

	if (ua.indexOf('chrome') > -1 || ua.indexOf('firefox') > -1) {
		console.log(message, styles);
	} else window.console.log(fallbackMessage);
})();
