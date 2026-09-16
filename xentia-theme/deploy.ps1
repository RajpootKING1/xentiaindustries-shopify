# PowerShell Automated FTP Deployment Script for Xentia Theme

$ftpHost  = "ftp://xentiaindustries.com"
$username = "theme@xentiaindustries.com"
$password = "~5oz;hCi+,ahZ5GB"
$localDir = "D:\xentia-theme"

# Files and folders to exclude
$excludePatterns = @("\.vscode", "\.git", "deploy\.ps1", "node_modules", "package-lock\.json", "package\.json")

function New-FtpDirectory {
    param (
        [string]$remoteUri
    )
    try {
        $request = [System.Net.FtpWebRequest]::Create($remoteUri)
        $request.Credentials = New-Object System.Net.NetworkCredential($username, $password)
        $request.Method = [System.Net.WebRequestMethods+Ftp]::MakeDirectory
        $request.UseBinary = $true
        $request.KeepAlive = $false
        $response = $request.GetResponse()
        $response.Close()
        Write-Host "Created remote directory: $remoteUri" -ForegroundColor Green
    }
    catch {
        # Directory might already exist
    }
}

function Send-FtpFile {
    param (
        [string]$localFilePath,
        [string]$remoteUri
    )
    try {
        $request = [System.Net.FtpWebRequest]::Create($remoteUri)
        $request.Credentials = New-Object System.Net.NetworkCredential($username, $password)
        $request.Method = [System.Net.WebRequestMethods+Ftp]::UploadFile
        $request.UseBinary = $true
        $request.KeepAlive = $false
        
        $fileBytes = [System.IO.File]::ReadAllBytes($localFilePath)
        $request.ContentLength = $fileBytes.Length
        
        $requestStream = $request.GetRequestStream()
        $requestStream.Write($fileBytes, 0, $fileBytes.Length)
        $requestStream.Close()
        
        $response = $request.GetResponse()
        $response.Close()
        Write-Host "SUCCESS: $localFilePath -> $remoteUri" -ForegroundColor Cyan
    }
    catch {
        Write-Host "ERROR uploading $localFilePath : $_" -ForegroundColor Red
    }
}

# Ensure root directory structure
Write-Host "Starting FTP Deployment to $ftpHost..." -ForegroundColor Yellow

$files = Get-ChildItem -Path $localDir -Recurse -File

foreach ($file in $files) {
    # Skip excluded patterns
    $skip = $false
    foreach ($pattern in $excludePatterns) {
        if ($file.FullName -match $pattern) {
            $skip = $true
            break
        }
    }
    if ($skip) { continue }

    # Compute relative path
    $relativePath = $file.FullName.Substring($localDir.Length).Replace("\", "/")
    if ($relativePath.StartsWith("/")) {
        $relativePath = $relativePath.Substring(1)
    }

    # Ensure parent directory exists on FTP
    $pathParts = $relativePath.Split('/')
    if ($pathParts.Length -gt 1) {
        $currentRemotePath = ""
        for ($i = 0; $i -lt ($pathParts.Length - 1); $i++) {
            $currentRemotePath += "/" + $pathParts[$i]
            New-FtpDirectory -remoteUri "$ftpHost$currentRemotePath"
        }
    }

    $targetRemoteUri = "$ftpHost/$relativePath"
    Send-FtpFile -localFilePath $file.FullName -remoteUri $targetRemoteUri
}

Write-Host "FTP Deployment Complete!" -ForegroundColor Green
