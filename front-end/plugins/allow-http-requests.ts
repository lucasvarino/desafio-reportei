const upgradeInsecureRequests = () => {
    const meta = document.createElement('meta')
    meta.setAttribute('http-equiv', 'Content-Security-Policy')
    meta.setAttribute('content', 'upgrade-insecure-requests')
    document.head.appendChild(meta)
}

export default upgradeInsecureRequests