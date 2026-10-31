Set-Location "c:\Projects\vivaazgems"

$destProject = "c:\Projects\vivaazgems\flatsome-child.zip"
$destCleanProject = "c:\Projects\vivaazgems\flatsome-child-theme-clean.zip"
$destDownloads = "C:\Users\AB COM\Downloads\flatsome-child.zip"
$destDownloadsClean = "C:\Users\AB COM\Downloads\flatsome-child-theme-clean.zip"

if (Test-Path $destProject) { Remove-Item $destProject -Force }
if (Test-Path $destCleanProject) { Remove-Item $destCleanProject -Force }

Write-Output "Building Linux/WordPress-compatible ZIP using tar.exe..."
tar.exe -a -c -f $destProject "flatsome-child"

Write-Output "Copying to theme-clean and Downloads..."
Copy-Item $destProject $destCleanProject -Force
Copy-Item $destProject $destDownloads -Force
Copy-Item $destProject $destDownloadsClean -Force

Add-Type -AssemblyName System.IO.Compression.FileSystem
$zip = [System.IO.Compression.ZipFile]::OpenRead($destDownloads)
$styleEntry = $zip.Entries | Where-Object { $_.FullName -like "*style.css*" }

Write-Output "Verification:"
Write-Output "ZIP entries count: $($zip.Entries.Count)"
Write-Output "style.css entry path: $($styleEntry.FullName)"
$zip.Dispose()
