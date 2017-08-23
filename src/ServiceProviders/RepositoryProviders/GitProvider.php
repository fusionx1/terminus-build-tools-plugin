<?php

namespace Pantheon\TerminusBuildTools\ServiceProviders\RepositoryProviders;

/**
 * Holds state information destined to be registered with the git repository service.
 */
interface GitProvider
{
    // TODO: Perhaps there should be a base interface shared by GitProvider
    // and CIProvider. getEnvironment would then move there. The CIProvider
    // environment would just be empty at the moment, though.
    public function getEnvironment();

    /**
     * Create a repository
     *
     * @param string $dir Local working copy of repository to create
     * @param string $target Project name of the repository to create
     * @param string $org Which org to create the project in; leave off to create a user repository.
     *
     * @return string Project created (usually org/target)
     */
    public function createRepository($dir, $target, $org = '');

    /**
     * Push repository back to repository service. Note that, in essence,
     * this is simply a `git push` command; however, it also provides the
     * credentials for the push operation, and does not require a remote
     * be set for the target.
     *
     * @param string $dir Local working copy of repository to push
     * @param string $target_project Project to push to; usually org/projectname
     */
    public function pushRepository($dir, $target_project);

    /**
     * Project URL to visit provided project in a web browser.
     *
     * @param string $target_project Project to generate browser URL for.
     *
     * @return string URL to target project.
     */
    public function projectURL($target_project);
}
