$src = "c:\Projects\vivaazgems\flatsome-child"
$dst = "c:\Projects\vivaazgems\flatsome-child-v3"

if (Test-Path $dst) {
    Remove-Item -Path $dst -Recurse -Force
}

Copy-Item -Path $src -Destination $dst -Recurse -Force

$styleFile = Join-Path $dst "style.css"
$raw = [System.IO.File]::ReadAllText($styleFile)
$raw = $raw.Replace("Theme Name: Flatsome Child", "Theme Name: Flatsome Child V3")
[System.IO.File]::WriteAllText($styleFile, $raw)

$zipPathV3 = "c:\Projects\vivaazgems\flatsome-child-v3.zip"
if (Test-Path $zipPathV3) {
    Remove-Item -Path $zipPathV3 -Force
}

$zipPathBase = "c:\Projects\vivaazgems\flatsome-child.zip"
if (Test-Path $zipPathBase) {
    Remove-Item -Path $zipPathBase -Force
}

Push-Location "c:\Projects\vivaazgems"
tar.exe -a -c -f flatsome-child-v3.zip flatsome-child-v3
tar.exe -a -c -f flatsome-child.zip flatsome-child
Pop-Location

$downDestV3 = "C:\Users\AB COM\Downloads\flatsome-child-v3.zip"
Copy-Item -Path $zipPathV3 -Destination $downDestV3 -Force

$downDestBase = "C:\Users\AB COM\Downloads\flatsome-child.zip"
Copy-Item -Path $zipPathBase -Destination $downDestBase -Force

Write-Host "Created $zipPathV3 and $zipPathBase, and copied both to Downloads successfully."
