export type Commit = {
    date: string,
    count: number
}

export type DetailedCommit = {
    id: number,
    message: string,
    author_name: string,
    author_email: string,
    commit_date: string,
    commit_hash: string,
    last_updated_at: string,
}