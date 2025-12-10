<ul role="list" class="divide-y divide-gray-100">
    <?php foreach ($users as $user): ?>

        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <?php if (!empty($user['photo_path']) && file_exists($user['photo_path'])): ?>
                    <img src="<?= htmlspecialchars($user['photo_path']) ?>" alt="" class="size-12 flex-none rounded-full bg-gray-50" />
                <?php else: ?>
                    <span>No Photo</span>
                <?php endif; ?>
                <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900"> <?= htmlspecialchars($user['username']) ?></p>
                    <p class="mt-1 truncate text-xs/5 text-gray-500"><?= htmlspecialchars($user['about']) ?></p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm/6 text-gray-900"><?= htmlspecialchars($user['position']) ?></p>
                <p class="mt-1 text-xs/5 text-gray-500"> <?= htmlspecialchars(timeAgo($user['created_at'])) ?> </p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>