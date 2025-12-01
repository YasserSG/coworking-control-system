<?php
use Illuminate\Support\Facades\Schema;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

Schema::disableForeignKeyConstraints();
Schema::dropIfExists('role_has_permissions');
Schema::dropIfExists('model_has_roles');
Schema::dropIfExists('model_has_permissions');
Schema::dropIfExists('roles');
Schema::dropIfExists('permissions');
Schema::enableForeignKeyConstraints();

echo "Tables dropped.";
